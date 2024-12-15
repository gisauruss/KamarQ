<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index(){
        return view('template.base');
    }

    public function dataUser(){
        $user = User::where('role', 'customer')->get();
        // get ini hanya untuk mengambil yang ada where (kondisinya)
        return view('Admin.DataUser.indexUser', compact('user'));
    }

    public function dataAdmin(){
        $admin = User::where('role', 'admin')->get();
        return view('Admin.DataUser.indexAdmin', compact('admin'));

    }

    public function deleteUser(Request $request){
        $user = User::findOrFail($request->id);
        // Storage::delete($user->image);
        $user->delete();
        return redirect()->route('data.user')->with('Delete', 'sudah menghapus data user');
    }
    public function deleteAdmin(Request $request){
        $admin = User::findOrFail($request->id);
        // Storage::delete($user->image);
        $admin->delete();
        return redirect()->route('data.admin')->with('Delete', 'sudah menghapus data admin');
    }

    public function createAdmin(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->password,
            'role' => $request->role,
        ]);
        return redirect()->back()->with('Sukses', 'Berhasil create data');
    }

    public function search(){
        
    }
}
