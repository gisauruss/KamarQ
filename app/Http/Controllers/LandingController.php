<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Review;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $review = Review::all();
        return view('Landing.front', compact('review'));
    }
    public function about(){
        return view('Landing.about');
    }
    public function rooms(){
        $kamar = Kamar::all();
        return view('Landing.rooms', compact('kamar'));
    }
    public function detail(){
        return view('Landing.detail');
    }

    public function search(Request $request){
        $query = $request->input('query');
        // ini search untuk 2 field dalam 1  table
        $kamar = Kamar::where('tipe_kamar', 'LIKE', "%{$query}%")
        ->orWhere('fasilitas', 'LIKE', "%{$query}%")->get();
        return view('Landing.rooms', compact( 'kamar'));
    }
}
