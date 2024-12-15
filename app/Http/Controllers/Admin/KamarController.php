<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KamarController extends Controller
{
    public function index(){
        // $kamar = Kamar::where('is_draft', '2')->orderBy('created_at', 'desc')->get();
        $kamar = Kamar::all();
        return view('Admin.DataKamar.indexKamar', compact('kamar'));
    }

    // public function indexlike()
    // {
    //     $userId = Auth::id();
    //     $post = Kamar::whereHas('likes', function ($query) use ($userId) {
    //         $query->where('user_id', $userId);
    //     })->get();
    //     return view('Landing.liked', compact('post', 'randomPost', 'randomUser'));
    // }


    public function detail(Request $request){
        $kamar = Kamar::findOrFail($request->id);
        return view('Admin.DataKamar.indexKamar', compact('kamar'));
    }

    public function tambah(Request $request){
        return view('Admin.DataKamar.createKamar');
    }

    public function create(Request $request){

        Kamar::create([
            'nomor_kamar' => $request->nomor_kamar,
            'nama_kamar' => $request->nama_kamar,
            'tipe_kamar' => $request->tipe_kamar,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'fasilitas' => $request->fasilitas,
      'foto_kamar' => $request->file('foto_kamar')->store('img-kamarr'),
            'harga' => $request->harga,
        ]);
       

        return redirect()->route('index.kamar')->with('Sukses', 'Berhasil menambahkan data Kamar');
    }

    public function edit($id){
        $kamar = Kamar::findOrFail($id);
        return view('Admin.DataKamar.editKamar', compact('kamar'));
    }

    public function update( Request $request, $id){

        // dd($request->all());
        $request->validate([
            'nomor_kamar' => 'required',
            'nama_kamar' => 'required',
            'fasilitas' => 'required',
            'tipe_kamar' => 'required',
            'status' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ]);

        $kamar = Kamar::findOrFail($id);

        $kamar->update([
            'nomor_kamar' => $request->nomor_kamar,
            'nama_kamar' => $request->nama_kamar,
            'fasilitas' => $request->fasilitas,
            'tipe_kamar' => $request->tipe_kamar,
            'status' => $request->status,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('index.kamar')->with('Sukses', 'Data Kamar Berhasil Di Update');

    }

    public function delete(Request $request){
        $admin = Kamar::findOrFail($request->id);
        $admin->delete();
        return redirect()->route('index.kamar')->with('Delete', 'sudah menghapus data kamar');
    }

    

}
