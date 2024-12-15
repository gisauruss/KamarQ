<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $komplen = Review::where('user_id', $user)->get();
        return view('Admin.Comment.indexKomen', compact('komplen'));
    }

    public function tambah()
    {
        // $kamar = Kamar::find($kamar_id);
        $komenkamar = Kamar::all();
        return view('Landing.komen', compact( 'komenkamar'));
    }

    public function create(Request $request){
        Review::create([
            'user_id' => Auth::user()->id,
            'kamar_id' => $request->kamar_id,
            'review_text' => $request->review_text
        ]);

        return redirect()->route('landing.home')->with('Sukses', 'Berhasil memberikan review kamar');
        
    }

    public function delete(Request $request){
        $admin = Review::findOrFail($request->id);
        $admin->delete();
        return redirect()->route('index.review')->with('Delete', 'sudah menghapus komen');
    }
}
