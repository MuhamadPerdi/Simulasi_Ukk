<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="form-container">
                    <h2 class="mb-4 text-center">Form Peminjaman Barang</h2>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4 mb-3">
                                <label for="id_inventaris" class="form-label">ID Inventaris</label>
                                <select name="id_inventaris" id="id_inventaris" class="form-select @error('id_inventaris') is-invalid @enderror" required>
                                    <option value="">Pilih ID Inventaris:</option>
                                    @foreach($inventaris as $item)
                                        <option value="{{ $item->id }}" 
                                            data-nama="{{ $item->nama_barang }}"
                                            data-id-inventaris="{{ $item->id_inventaris }}"
                                            {{ old('id_inventaris') == $item->id ? 'selected' : '' }}>
                                            {{ $item->id_inventaris }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <select name="nama_barang" id="nama_barang" class="form-select" required>
                                    <option value="">Pilih Nama Barang:</option>
                                    @foreach($inventaris as $item)
                                        <option value="{{ $item->nama_barang }}"
                                            data-id="{{ $item->id }}"
                                            data-id-inventaris="{{ $item->id_inventaris }}"
                                            {{ old('nama_barang') == $item->nama_barang ? 'selected' : '' }}>
                                            {{ $item->nama_barang }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                                <input type="text" 
                                       name="nama_peminjam" 
                                       id="nama_peminjam" 
                                       class="form-control @error('nama_peminjam') is-invalid @enderror" 
                                       placeholder="Nama Peminjam" 
                                       value="{{ old('nama_peminjam') }}"
                                       required>
                                @error('nama_peminjam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                                <input type="date" 
                                       name="tanggal_pinjam" 
                                       id="tanggal_pinjam" 
                                       class="form-control @error('tanggal_pinjam') is-invalid @enderror" 
                                       value="{{ old('tanggal_pinjam') ?? date('Y-m-d') }}"
                                       required>
                                @error('tanggal_pinjam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                                <input type="date" 
                                       name="tanggal_kembali" 
                                       id="tanggal_kembali" 
                                       class="form-control @error('tanggal_kembali') is-invalid @enderror" 
                                       value="{{ old('tanggal_kembali') }}"
                                       required>
                                @error('tanggal_kembali')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class="form-group col-md-4 mb-3">
                                <label for="petugas" class="form-label">Petugas</label>
                                <input type="text" 
                                       name="petugas" 
                                       id="petugas" 
                                       class="form-control @error('petugas') is-invalid @enderror" 
                                       placeholder="Petugas" 
                                       value="{{ old('petugas') }}"
                                       required>
                                @error('petugas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Submit Peminjaman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#id_inventaris, #nama_barang').on('change', function() {
                const source = $(this).attr('id');
                const selectedOption = $(this).find('option:selected');
                
                if (selectedOption.val()) {
                    if (source === 'id_inventaris') {
                        // When ID Inventaris is selected
                        $('#nama_barang')
                            .val(selectedOption.data('nama'))
                            .prop('disabled', true);
                    } else {
                        // When Nama Barang is selected
                        const idInventaris = selectedOption.data('id-inventaris');
                        $('#id_inventaris')
                            .val($(`#id_inventaris option[data-id-inventaris="${idInventaris}"]`).val())
                            .prop('disabled', true);
                    }
                } else {
                    // Reset fields when no selection
                    if (source === 'id_inventaris') {
                        $('#nama_barang').val('').prop('disabled', false);
                    } else {
                        $('#id_inventaris').val('').prop('disabled', false);
                    }
                }
            });

            // Enable fields before form submission
            $('form').on('submit', function() {
                $('#id_inventaris, #nama_barang').prop('disabled', false);
            });
        });
    </script>
</body>
</html>
