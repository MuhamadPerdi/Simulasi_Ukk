<!-- filepath: /C:/Users/Perdi/Simulasi_Ukk/resources/views/peminjaman/edit.blade.php -->
@extends('layouts.app')
@section('title', 'Edit Peminjaman')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/peminjaman') }}">Peminjaman</a></li>
                    <li class="breadcrumb-item active">Edit Peminjaman</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Peminjaman</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Edit Peminjaman</h4>
                <br>
                <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-4 mb-3">
                            <label for="id_inventaris" class="form-label">ID Inventaris</label>
                            <select name="id_inventaris" id="id_inventaris" class="form-control" required>
                                @foreach($inventaris as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $peminjaman->id_inventaris ? 'selected' : '' }}>{{ $item->id_inventaris }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <select name="nama_barang" id="nama_barang" class="form-control" required>
                                @foreach($inventaris as $item)
                                    <option value="{{ $item->nama_barang }}" {{ $item->nama_barang == $peminjaman->nama_barang ? 'selected' : '' }}>{{ $item->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                            <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" value="{{ $peminjaman->nama_peminjam }}" required>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{ $peminjaman->tanggal_pinjam }}" required>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="{{ $peminjaman->tanggal_kembali }}" required>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">Pilih:</option>
                                <option value="belum kembali" {{ $peminjaman->status == 'Belum Kembali' ? 'selected' : '' }}>Belum Kembali</option>
                                <option value="proses" {{ $peminjaman->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                                <option value="sudah kembali" {{ $peminjaman->status == 'Sudah Kembali' ? 'selected' : '' }}>Sudah Kembali</option>
                                <option value="batal" {{ $peminjaman->status == 'Batal' ? 'selected' : '' }}>Batal</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="petugas" class="form-label">Petugas</label>
                            <input type="text" name="petugas" id="petugas" class="form-control" value="{{ $peminjaman->petugas }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection