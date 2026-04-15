<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::query();

        if ($request->sort == 'terbaru') {
            $query->orderBy('date', 'desc');
        } elseif ($request->sort == 'terlama') {
            $query->orderBy('date', 'asc');
        } elseif ($request->sort == 'terbesar') {
            $query->orderBy('amount', 'desc');
        } elseif ($request->sort == 'terkecil') {
            $query->orderBy('amount', 'asc');
        } elseif ($request->sort == 'pemasukan') {
            $query->where('type', 'pemasukan');
        } elseif ($request->sort == 'pengeluaran') {
            $query->where('type', 'pengeluaran');
        } else {
            $query->orderBy('date', 'desc'); // default
        }

        $transactions = $query->get();

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function laporan(Request $request)
{
    $bulan = $request->bulan;

    $transactions = Transaction::when($bulan, function ($query) use ($bulan) {
        return $query->whereMonth('date', $bulan);
    })->get();

    return view('laporan.index', compact('transactions', 'bulan'));
}
}