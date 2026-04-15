<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

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

        return view('dashboard', compact(
            'totalMasuk',
            'totalKeluar',
            'saldo',
            'dataChart'
        ));
    }
}