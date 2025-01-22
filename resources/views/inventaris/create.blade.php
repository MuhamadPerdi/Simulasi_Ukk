<!-- filepath: /C:/Users/Perdi/Simulasi_Ukk/resources/views/inventaris/create.blade.php -->
@extends('layouts.app')

@section('title', 'Inventaris')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('inventaris.index')}}">Inventaris</a></li>
                    <li class="breadcrumb-item active">Create Inventaris</li>
                </ol>
            </div>
            <h4 class="page-title">Starter</h4>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Tambah Inventaris</h4>
            <br>
            <form action="{{ route('inventaris.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="id_inventaris" class="form-label">ID Inventaris</label>
                        <input type="text" name="id_inventaris" id="id_inventaris" class="form-control" placeholder="ID Inventaris" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-control" required>
                            <option value="">Pilih:</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Perbaikan">Perbaikan</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" name="stok" id="stok" class="form-control" placeholder="Stok" required>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="tanggal_register" class="form-label">Tanggal Register</label>
                        <input type="date" name="tanggal_register" id="tanggal_register" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection