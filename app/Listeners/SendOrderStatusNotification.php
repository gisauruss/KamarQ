<?php

namespace App\Listeners;

use App\Events\OrderStatusChanged;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOrderStatusNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderStatusChanged $event): void
    {
        $transaksi = $event->transaksi;
        $user = $transaksi->user;

        $message = '';
        switch ($transaksi->status) {
            case 'pending':
                $message = 'Kamu baru saja memesan kamar';
                break;
            case 'confirmed':
                $message = 'Pesananmu sudah di terima';
                break;
            case 'done':
                $message = 'Kamu sudah selesai menyewa kamar kami';
                break;
            case 'canceled':
                $message = 'Pesananmu telah dibatalkan';
                break;
        }

        Notification::create([
            'user_id' => $user->id,
            'title' => 'Status pesanan',
            'message' => $message,

        ]);

    }
}
