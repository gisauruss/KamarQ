<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\Likes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        $user = Auth::user()->id;
        $komplen = Likes::where('user_id', $user)->get();
        return view('Admin.Likes.indexLike', compact('komplen'));

    }

    public function like(Request $request)
    {
        $like = new Likes();
        $like->user_id = Auth::id();
        $like->kamar_id = $request->kamar_id;
        $like->save();

        return response()->json(['success' => true]);
    }

    public function unlike(Request $request)
    {
        $like = Likes::where('user_id', Auth::id())
            ->where('kamar_id', $request->kamar_id)
            ->first();
        if ($like) {
            $like->delete();
        }

        return response()->json(['success' => true]);
    }

    public function indexlike()
    {
        $userId = Auth::id();
        $liked = Kamar::whereHas('likes', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        return view('Landing.liked', compact('liked', ));
    }

}
