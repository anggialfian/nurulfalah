<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Kegiatan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMasuk = Transaction::where('type','pemasukan')->sum('amount');
        $totalKeluar = Transaction::where('type','pengeluaran')->sum('amount');
        $saldo = $totalMasuk - $totalKeluar;

        $dataChart = [
            'pemasukan' => $totalMasuk,
            'pengeluaran' => $totalKeluar
        ];

        $kegiatans = Kegiatan::where('tanggal', '>=', Carbon::today())
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('dashboard', compact(
            'totalMasuk',
            'totalKeluar',
            'saldo',
            'dataChart',
            'kegiatans'
        ));
    }
}