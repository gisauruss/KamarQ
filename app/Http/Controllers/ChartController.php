<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use App\Models\SewaKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function chart()
    {
        $userId = Auth::id(); // ID user yang login

        // Data jumlah likes per minggu
        $likeData = Likes::where('user_id', $userId)
            ->selectRaw('YEARWEEK(created_at, 1) as week, COUNT(*) as total')
            ->groupBy('week')
            ->orderBy('week', 'ASC')
            ->get();

        // Data jumlah sewa per minggu
        $sewaData = SewaKamar::where('user_id', $userId)
            ->selectRaw('YEARWEEK(created_at, 1) as week, COUNT(*) as total')
            ->groupBy('week')
            ->orderBy('week', 'ASC')
            ->get();

        // Gabungkan semua minggu untuk membuat label chart
        $allWeeks = $likeData->pluck('week')->merge($sewaData->pluck('week'))->unique()->sort();

        // Format data untuk chart
        $labels = [];
        $likeCounts = [];
        $sewaCounts = [];

        foreach ($allWeeks as $week) {
            $labels[] = 'Week ' . substr($week, -2); // Format nama minggu
            $likeCounts[] = $likeData->where('week', $week)->first()->total ?? 0; // Data likes
            $sewaCounts[] = $sewaData->where('week', $week)->first()->total ?? 0; // Data sewa
        }

        return view('Admin.Charts.indexCharts', compact('labels', 'likeCounts', 'sewaCounts'));
    }
}
