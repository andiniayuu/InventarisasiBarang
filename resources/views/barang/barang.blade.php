<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">

    <div class="container my-5">
      <!-- Navigation -->
      <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('peminjaman') }}" class="btn btn-primary">Peminjaman</a>
      </div>

      <!-- List Barang -->
      <div class="row">
        @foreach ($barangs as $barang)
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                <p class="card-text">
                  <strong>Kode Barang:</strong> {{ $barang->kode_barang }}<br>
                  <strong>Jumlah Barang:</strong> {{ $barang->jumlah_barang }}
                </p>
                <form action="{{ route('hapusBarang', ['id_barang' => $barang->id]) }}" method="post" class="d-inline">
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm">Hapus Barang</button>
                </form>
                <a href="{{ route('editBarang', ['id_barang' => $barang->id]) }}" class="btn btn-warning btn-sm">Edit Barang</a>
                <a href="{{ route('peminjamanTambah', ['id_barang' => $barang->id]) }}" class="btn btn-success btn-sm">Pinjam Barang</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Form Tambah Barang -->
      <div class="card mt-5">
        <div class="card-header bg-primary text-white">
          <h4>Tambah Barang</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('tambahBarang') }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="kode_barang" class="form-label">Kode Barang</label>
              <input type="text" id="kode_barang" name="kode_barang" class="form-control" placeholder="Masukkan kode barang" required>
            </div>
            <div class="mb-3">
              <label for="nama_barang" class="form-label">Nama Barang</label>
              <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Masukkan nama barang" required>
            </div>
            <div class="mb-3">
              <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
              <input type="number" id="jumlah_barang" name="jumlah_barang" class="form-control" placeholder="Masukkan jumlah barang" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS (Optional, for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
