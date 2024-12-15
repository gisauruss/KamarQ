<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $komplen = Complaint::where('user_id', $user)->get();
        return view('Admin.Complaint.indexComplaint', compact('komplen'));

    }

    public function tambah()
    {
        // $kamar = Kamar::find($kamar_id);
        $komplen = Kamar::all();
        return view('Admin.Complaint.createComplaint', compact( 'komplen'));
    }

    public function create(Request $request){
        Complaint::create([
            'user_id' => Auth::user()->id,
            'kamar_id' => $request->kamar_id,
            'complaint_text' => $request->complaint_text
        ]);

        return redirect()->route('landing.home')->with('Sukses', 'Berhasil memberikan komplen kamar');
        
    }

    public function delete(Request $request){
        $admin = Complaint::findOrFail($request->id);
        $admin->delete();
        return redirect()->route('index.complaint')->with('Delete', 'sudah menghapus komen');
    }
}
