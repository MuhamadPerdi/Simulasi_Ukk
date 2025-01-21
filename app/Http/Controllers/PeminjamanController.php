<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        if ($search) {
            $peminjaman = Peminjaman::where('nama_peminjam', 'LIKE', "%{$search}%")
                ->orWhere('tanggal_pinjam', 'LIKE', "%{$search}%")
                ->orWhere('tanggal_kembali', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->orWhere('petugas', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $peminjaman = Peminjaman::paginate(10);
        }

        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $inventaris = Inventaris::all();
        return view('peminjaman', compact('inventaris'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'id_inventaris' => 'required|exists:inventaris,id',
            'nama_barang' => 'required|exists:inventaris,nama_barang',
            'nama_peminjam' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'status' => 'nullable|string|in:Belum Kembali,Sudah Kembali,Proses,Batal',
            'petugas' => 'required|string|max:255',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('home')
            ->with('success', 'Peminjaman created successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:Proses,Belum Kembali,Sudah Kembali,Batal',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update(['status' => $request->status]);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Status updated successfully.');
    }



    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman deleted successfully.');
    }
}
