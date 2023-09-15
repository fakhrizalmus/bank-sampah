<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="/admin/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        @include('admin.layout.topbar')
        @include('admin.layout.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Buku</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"></li>
                    </ol>
                    <form action="/post-sampah" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" id="created_at" name="created_at" autofocus
                            value="<?= date('Y-m-d') ?>">
                        <div class="row mb-3">
                            <label for="jenis_sampah" class="col-sm-2 col-form-label">Nama Sampah</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @error('jenis_sampah') is-invalid @else @enderror"
                                    id="jenis_sampah" name="jenis_sampah" autofocus value="<?= old('jenis_sampah') ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    @error('jenis_sampah')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @error('deskripsi') is-invalid @else @enderror" id="deskripsi"
                                    name="deskripsi" autofocus value="<?= old('deskripsi') ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    @error('deskripsi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('harga') is-invalid @else @enderror"
                                    id="harga" name="harga" autofocus value="<?= 0 ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    @error('harga')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="foto" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-2">
                                <img src="/img/undraw_profile.svg" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control @error('foto') is-invalid @else @enderror"
                                        id="foto" name="foto" onchange="preview()">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        @error('foto')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <label class="input-group-text" for="foto">Upload</label>
                                </div>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    @error('foto')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website <?= date('Y') ?></div>
                        <!-- <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div> -->
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/admin/min/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/admin/min/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('/admin/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('/admin/min/js/datatables-simple-demo.js') }}"></script>
</body>

</html>
