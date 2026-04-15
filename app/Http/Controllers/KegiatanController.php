<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::all();
        return view('kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required|date',
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('kegiatan.index')
            ->with('success', 'Data kegiatan berhasil ditambahkan');
    }

    // 🔥 TAMBAHAN MULAI SINI

    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required|date',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}