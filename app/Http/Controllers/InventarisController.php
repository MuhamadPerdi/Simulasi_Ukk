<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InventarisController extends Controller
{
    public function home(Request $request)
    {
        // Ambil semua data inventaris
        $inventaris = Inventaris::query();

        // Pencarian berdasarkan nama barang
        if ($request->has('search')) {
            $inventaris->where('nama_barang', 'LIKE', '%' . $request->search . '%');
        }

        // Ambil data dengan pagination
        $inventaris = $inventaris->paginate(10);

        return view('home', compact('inventaris'));
    }
    public function index()
    {
        $inventaris = Inventaris::paginate(10);
        return view('inventaris.index', compact('inventaris'));
    }

    public function create()
    {
        return view('inventaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'id_inventaris' => 'required|string|unique:inventaris,id_inventaris',
            'nama_barang' => 'required|string|unique:inventaris,nama_barang',
            'kondisi' => 'required|string|in:Baik,Rusak,Perbaikan',
            'stok' => 'required|integer',
            'tanggal_register' => 'required|date',
        ]);

        Inventaris::create($request->all());

        return redirect()->route('inventaris.index')
            ->with('success', 'Inventaris created successfully.');
    }

    public function edit(Inventaris $inventari)
    {

        return view('inventaris.edit', compact('inventari'));
    }

    public function update(Request $request, Inventaris $inventari)
    {
        $request->validate([
            'id_inventaris' => [
                'required',
                'string',
                Rule::unique('inventaris')->ignore($inventari->id),
            ],
            'nama_barang' => [
                'required',
                'string',
                Rule::unique('inventaris')->ignore($inventari->id),
            ],
            'kondisi' => 'required|string|in:Baik,Rusak,Perbaikan',
            'stok' => 'required|integer',
            'tanggal_register' => 'required|date',
        ]);
    
        // Pastikan tidak ada referensi aktif di tabel peminjaman
        if (Peminjaman::where('nama_barang', $inventari->nama_barang)->exists()) {
            return redirect()->route('inventaris.index')
                ->with('error', 'Tidak dapat memperbarui inventaris karena masih ada referensi aktif di tabel peminjaman.');
        }
    
        $inventari->update($request->all());
    
        return redirect()->route('inventaris.index')
            ->with('success', 'Data inventaris berhasil diperbarui');
    }

    public function destroy(Inventaris $inventaris)
    {
        $inventaris->delete();

        return redirect()->route('inventaris.index')
            ->with('success', 'Inventaris deleted successfully');
    }
}
