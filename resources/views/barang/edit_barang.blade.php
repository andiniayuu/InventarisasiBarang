<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Barang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Barang</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('edit') }}" method="post">
                            @csrf
                            @method("PUT")

                            <input type="hidden" name="id" value="{{ $barang->id }}">

                            <div class="mb-3">
                                <label for="kode_barang" class="form-label">Kode Barang</label>
                                <input type="text" id="kode_barang" name="kode_barang" class="form-control" value="{{ $barang->kode_barang }}" placeholder="Masukkan kode barang" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" id="nama_barang" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" placeholder="Masukkan nama barang" required>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                                <input type="number" id="jumlah_barang" name="jumlah_barang" class="form-control" value="{{ $barang->jumlah_barang }}" placeholder="Masukkan jumlah barang" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Edit</button>
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
