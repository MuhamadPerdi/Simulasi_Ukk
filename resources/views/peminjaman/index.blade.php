<!-- filepath: /C:/Users/Perdi/Simulasi_Ukk/resources/views/peminjaman/index.blade.php -->
@extends('layouts.app')

@section('title', 'Peminjaman')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">Peminjaman</li>
                </ol>
            </div>
            <h4 class="page-title">Peminjaman</h4>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Daftar Peminjaman</h4>
            
            <div class="row mb-3">
                <div class="col-md-6">
                   
                </div>
                <div class="col-md-6">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari peminjaman (nama peminjam, status, ID)...">
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="peminjamanTable">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>ID Inventaris</th>
                            <th>Nama Barang</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Petugas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->inventaris->id_inventaris }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->nama_peminjam }}</td>
                                <td>{{ $item->tanggal_pinjam }}</td>
                                <td>{{ $item->tanggal_kembali }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->petugas }}</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <!-- Dropdown untuk Ubah Status -->
                                        <form action="{{ route('peminjaman.updateStatus', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" style="width: auto;">
                                                <option value="">Pilih</option>
                                                <option value="Proses" {{ $item->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                                                <option value="Belum Kembali" {{ $item->status == 'Belum Kembali' ? 'selected' : '' }}>Belum Kembali</option>
                                                <option value="Sudah Kembali" {{ $item->status == 'Sudah Kembali' ? 'selected' : '' }}>Sudah Kembali</option>
                                                <option value="Batal" {{ $item->status == 'Batal' ? 'selected' : '' }}>Batal</option>
                                            </select>
                                        </form>
                                
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                                <i class="mdi mdi-trash-can-outline"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-between align-items-center">
                    <div id="paginationInfo">
                        Menampilkan {{ $peminjaman->firstItem() }} - {{ $peminjaman->lastItem() }} 
                        dari {{ $peminjaman->total() }} data
                    </div>
                    {{ $peminjaman->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Live search functionality
    $('#searchInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $("#peminjamanTable tbody tr").filter(function() {
            // Cari di semua kolom
            var rowText = $(this).text().toLowerCase();
            $(this).toggle(rowText.indexOf(value) > -1);
        });

        // Update tampilan jika tidak ada hasil
        updateSearchResults();
    });

    // Fungsi untuk mengupdate tampilan hasil pencarian
    function updateSearchResults() {
        var visibleRows = $('#peminjamanTable tbody tr:visible').length;
        var totalRows = $('#peminjamanTable tbody tr').length;

        if (visibleRows === 0) {
            // Sembunyikan pagination jika tidak ada hasil
            $('#paginationInfo').html(`
                <div class="alert alert-info text-center">
                    Tidak ada data ditemukan
                </div>
            `);
        } else {
            // Kembalikan informasi pagination
            $('#paginationInfo').html(`
                Menampilkan ${visibleRows} dari ${totalRows} data
            `);
        }
    }
});
</script>
@endpush