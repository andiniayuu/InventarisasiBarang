<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Peminjaman</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Peminjaman</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tambahPeminjaman') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $barang->id }}">

                            <div class="mb-3">
                                <h5>Nama Barang: <strong>{{ $barang->nama_barang }}</strong></h5>
                            </div>

                            <div class="mb-3">
                                <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                                <input type="text" id="nama_peminjam" name="nama_peminjam" class="form-control" placeholder="Masukkan nama peminjam" required>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_barang_dipinjam" class="form-label">Jumlah Barang</label>
                                <input 
                                    type="number" 
                                    id="jumlah_barang_dipinjam" 
                                    name="jumlah_barang_dipinjam" 
                                    class="form-control" 
                                    placeholder="Jumlah barang yang akan dipinjam" 
                                    value="1" 
                                    min="1" 
                                    max="{{ $barang->jumlah_barang }}" 
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_dipinjam" class="form-label">Tanggal Dipinjam</label>
                                <input type="date" id="tanggal_dipinjam" name="tanggal_dipinjam" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_dikembalikan" class="form-label">Tanggal Dikembalikan</label>
                                <input type="date" id="tanggal_dikembalikan" name="tanggal_dikembalikan" class="form-control" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Pinjam Barang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
