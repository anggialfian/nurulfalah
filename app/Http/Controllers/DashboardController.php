<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Kegiatan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 🔥 TOTAL SEMUA (untuk grafik lama)
        $totalMasuk = Transaction::where('type','pemasukan')->sum('amount');
        $totalKeluar = Transaction::where('type','pengeluaran')->sum('amount');
        $saldo = $totalMasuk - $totalKeluar;

        $dataChart = [
            'pemasukan' => $totalMasuk,
            'pengeluaran' => $totalKeluar
        ];

        // 🔥 DATA 30 HARI TERAKHIR
        $start = Carbon::now()->subDays(30);

        $pemasukan30 = Transaction::where('type','pemasukan')
            ->where('date', '>=', $start)
            ->sum('amount');

        $pengeluaran30 = Transaction::where('type','pengeluaran')
            ->where('date', '>=', $start)
            ->sum('amount');

        $saldo30 = $pemasukan30 - $pengeluaran30;

        // 🔥 LIST TRANSAKSI (UNTUK RINCIAN)
        $pemasukanList = Transaction::where('type','pemasukan')
            ->where('date', '>=', $start)
            ->latest()
            ->take(5)
            ->get();

        $pengeluaranList = Transaction::where('type','pengeluaran')
            ->where('date', '>=', $start)
            ->latest()
            ->take(5)
            ->get();

        // 🔥 KEGIATAN MENDATANG
        $kegiatans = Kegiatan::where('tanggal', '>=', Carbon::today())
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('dashboard', compact(
            'totalMasuk',
            'totalKeluar',
            'saldo',
            'dataChart',
            'kegiatans',

            // tambahan baru
            'pemasukan30',
            'pengeluaran30',
            'saldo30',
            'pemasukanList',
            'pengeluaranList'
        ));
    }
}