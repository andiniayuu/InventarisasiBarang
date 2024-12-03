<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Peminjaman</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <!-- Navigation -->
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('barang') }}" class="btn btn-primary">Barang</a>
        </div>

        <!-- Title -->
        <div class="text-center mb-4">
            <h1 class="text-primary">Daftar Peminjaman</h1>
        </div>

        <!-- List Peminjaman -->
        <div class="row">
            @foreach ($peminjamans as $peminjaman)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Barang: {{ $peminjaman->nama_barang }}</h5>
                            <p class="card-text">
                                <strong>Nama Peminjam:</strong> {{ $peminjaman->nama_peminjam }}<br>
                                <strong>Jumlah Barang Dipinjam:</strong> {{ $peminjaman->jumlah_barang_dipinjam }}<br>
                                <strong>Tanggal Dipinjam:</strong> {{ $peminjaman->tanggal_dipinjam }}<br>
                                <strong>Tanggal Dikembalikan:</strong> {{ $peminjaman->tanggal_dikembalikan }}
                            </p>
                            <form action="{{ route('hapusPeminjaman', ['id_peminjaman' => $peminjaman->id]) }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Hapus Peminjaman</button>
                            </form>
                            <a href="{{ route('halamanEditPeminjaman', ['id_peminjaman' => $peminjaman->id]) }}" class="btn btn-warning btn-sm">Edit Peminjaman</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
