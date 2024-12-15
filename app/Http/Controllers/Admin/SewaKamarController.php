<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\Notifikasi;
use App\Models\SewaKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SewaKamarController extends Controller
{
    public function index(){

        $sewa = SewaKamar::all();
        return view('Admin.SewaKamar.indexSewa', compact('sewa'));
    }
    public function sewa($kamar_id)
    {
        $kamar = Kamar::find($kamar_id);
        $sewakamar = Kamar::all();
        return view('Landing.detail', compact('kamar', 'kamar_id', 'sewakamar'));
    }
    public function komen($kamar_id)
    {
        $kamar = Kamar::find($kamar_id);
        $sewakamar = Kamar::all();
        return view('Landing.komen', compact('kamar', 'kamar_id', 'sewakamar'));
    }
    public function komplen($kamar_id)
    {
        $kamar = Kamar::find($kamar_id);
        $sewakamar = Kamar::all();
        return view('Admin.Complaint.createComplaint', compact('kamar', 'kamar_id', 'sewakamar'));
    }

    public function create( Request $request){

        SewaKamar::create([
            'user_id' => Auth::user()->id,
            'kamar_id' => $request->kamar_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'deskripsi' => $request->deskripsi,
            'fasilitas_tambahan' => $request->fasilitas_tambahan,
        ]);
       

        return redirect()->route('landing.home')->with('Sukses', 'Berhasil menyewa kamar');
    }

    public function edit($id){
        $kamar = SewaKamar::findOrFail($id);
        return view('Admin.SewaKamar.editSewa', compact('kamar'));
    }

    public function Update(Request $request, $id){
        $transaksi = SewaKamar::findOrFail($id);
        $transaksi->status = $request->status;
        $transaksi->update();

        return redirect()->back()->with('success', 'berhasil mengUpdate Status Transaksi');
    }

    public function detail(Request $request){
        $kamar = SewaKamar::findOrFail($request->id);
        return view('Admin.DataSewa.indexSewa', compact('kamar'));
    }


}
