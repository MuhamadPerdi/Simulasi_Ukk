<!-- filepath: /C:/Users/Perdi/Simulasi_Ukk/resources/views/inventaris/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Inventaris')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/inventaris') }}">Inventaris</a></li>
                    <li class="breadcrumb-item active">Edit Inventaris</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Inventaris</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Edit Inventaris</h4>
                <br>
                <form action="{{ route('inventaris.update', $inventari->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="id_inventaris" class="form-label">ID Inventaris</label>
                            <input type="text" name="id_inventaris" id="id_inventaris" class="form-control" value="{{ $inventari->id_inventaris }}" required>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ $inventari->nama_barang }}" required>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="kondisi" class="form-label">Kondisi</label>
                            <select name="kondisi" id="kondisi" class="form-control" required>
                                <option value="Baik" {{ $inventari->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak" {{ $inventari->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                <option value="Perbaikan" {{ $inventari->kondisi == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" name="stok" id="stok" class="form-control" value="{{ $inventari->stok }}" required>
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="tanggal_register" class="form-label">Tanggal Register</label>
                            <input type="date" name="tanggal_register" id="tanggal_register" class="form-control" value="{{ $inventari->tanggal_register }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection