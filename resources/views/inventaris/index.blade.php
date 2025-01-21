@extends('layouts.app')

@section('title', 'Inventaris')

@push('styles')
<style>
    .highlight {
        background-color: yellow;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">Inventaris</li>
                </ol>
            </div>
            <h4 class="page-title">Inventaris</h4>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Daftar Inventaris</h4>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <a href="{{ route('inventaris.create') }}" class="btn btn-primary">Tambah Inventaris</a>
                </div>
                <div class="col-md-6">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari inventaris (nama barang, kondisi, ID)...">
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="inventarisTable">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>ID Inventaris</th>
                            <th>Nama Barang</th>
                            <th>Kondisi</th>
                            <th>Stok</th>
                            <th>Tanggal Register</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventaris as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->id_inventaris }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->kondisi }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>{{ $item->tanggal_register }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('inventaris.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                            <i class="mdi mdi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                                <i class="mdi mdi-trash-can"></i> Hapus
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
                        Menampilkan {{ $inventaris->firstItem() }} - {{ $inventaris->lastItem() }} 
                        dari {{ $inventaris->total() }} data
                    </div>
                    {{ $inventaris->links() }}
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
        $("#inventarisTable tbody tr").filter(function() {
            // Cari di semua kolom
            var rowText = $(this).text().toLowerCase();
            $(this).toggle(rowText.indexOf(value) > -1);
        });

        // Update tampilan jika tidak ada hasil
        updateSearchResults();
    });

    // Fungsi untuk mengupdate tampilan hasil pencarian
    function updateSearchResults() {
        var visibleRows = $('#inventarisTable tbody tr:visible').length;
        var totalRows = $('#inventarisTable tbody tr').length;

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