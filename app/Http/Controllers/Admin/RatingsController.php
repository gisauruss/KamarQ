<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ratings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingsController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $komplen = Ratings::where('user_id', $user)->get();
        return view('Admin.Rating.indexRating', compact('komplen'));

    }

    public function rate(Request $request){
        $rating = Ratings::updateOrCreate(
            ['user_id' => Auth::id(), 'kamar_id' => $request->kamar_id],
            ['rating' => $request->rating]
        );

        return response()->json(['success' => true]);
    }
}
