<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-inventaris {
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #ffffff, #e9ecef);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-inventaris:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .card-inventaris .icon-container {
            width: 60px;
            height: 60px;
            background-color: #007bff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 30px;
            margin-bottom: 10px;
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .badge {
            font-size: 0.85rem;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Inventaris</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <!-- Pencarian -->
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari nama barang atau kategori...">
                <button class="btn btn-primary" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Alert jika data tidak ditemukan -->
    <div id="noResultAlert" class="alert alert-warning text-center" style="display: none;">
        Barang tidak ditemukan.
    </div>

    <!-- Kartu Inventaris -->
    <div class="row" id="inventarisContainer">
        @foreach($inventaris as $item)
        <div class="col-sm-6 col-lg-4 mb-4 inventaris-item" 
             data-nama="{{ strtolower($item->nama_barang) }}" 
             data-kategori="{{ strtolower($item->kategori) }}">
            <div class="card card-inventaris h-100 p-3">
                <div class="d-flex flex-column align-items-center text-center">
                    <div class="icon-container">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <h5 class="card-title">{{ $item->nama_barang }}</h5>
                    <div class="d-flex justify-content-between w-100">
                        <span class="badge bg-primary">{{ $item->kategori }}</span>
                        <span class="badge bg-success">Stok: {{ $item->stok }}</span>
                    </div>
                    <p class="card-text mt-2 text-muted">{{ Str::limit($item->deskripsi, 100) }}</p>
                    @if($item->stok > 0)
                    <a href="{{ url('peminjaman/create/') }}" class="btn btn-primary w-100 mt-3">
                        <i class="bi bi-cart-plus"></i> Pinjam
                    </a>
                    @else
                    <button class="btn btn-secondary w-100 mt-3" disabled>
                        <i class="bi bi-cart-plus"></i> Habis
                    </button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    const searchInput = $('#searchInput');
    const inventarisItems = $('.inventaris-item');
    const noResultAlert = $('#noResultAlert');

    searchInput.on('input', function() {
        const searchValue = $(this).val().toLowerCase();
        let hasVisibleItem = false;

        inventarisItems.each(function() {
            const item = $(this);
            const nama = item.data('nama');
            const kategori = item.data('kategori');

            const matchesSearch = nama.includes(searchValue) || kategori.includes(searchValue);

            if (matchesSearch) {
                item.fadeIn();
                hasVisibleItem = true;
            } else {
                item.fadeOut();
            }
        });

        if (hasVisibleItem) {
            noResultAlert.hide();
        } else {
            noResultAlert.fadeIn();
        }
    });
});
</script>
</body>
</html>
