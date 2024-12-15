<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Notifikasi;
use App\Models\SewaKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function transaksiUpdate(Request $request, $id){
        $transaksi = SewaKamar::findOrFail($id);
        $transaksi->status = $request->status;
        $transaksi->update();

        return redirect()->back()->with('success', 'berhasil mengUpdate Status Transaksi');
    }
    public function markAsRead($id){
        $notification = Notification::findOrFail($id);
        $notification->markAsRead();

        return redirect()->back()->with('success', 'notification marked as read');
    }
    
}
