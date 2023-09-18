<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="/admin/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        @include('user.layout.topbar')
        @include('user.layout.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    {{-- <a href="/tambah" class="btn btn-primary mb-3">Tambah</a> --}}
                    {{-- <a href="/sampah-buku" class="btn btn-danger mb-3"><i class="fa-solid fa-trash"></i> Sampah</a> --}}
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                {{-- <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                {!! $Chart->container() !!}
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">No.</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Lama Penyimpanan(hari)</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Harga per kilo</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($sampah as $k) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <?php if ($k->foto == NULL) : ?>
                                <td>NULL</td>
                                <?php else : ?>
                                <td><img src="storage/img/<?= $k->foto ?>" alt="" width="100px"></td>
                                <?php endif; ?>
                                <td><?= $k->jenis_sampah ?></td>
                                <td><?= $k->lama_penyimpanan ?></td>
                                <td><?= $k->deskripsi ?></td>
                                <td><?= $k->harga ?></td>
                                <td>
                                    {{-- <form action="/delete-sampah/<?= $k->id_sampah ?>" method="post" class="d-inline"
                                        onsubmit="return confirm('Yakin akan hapus data anda?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" style="margin-bottom: 5px;"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form> --}}
                                    <form action="/sampah/<?= $k->id_sampah ?>" class="d-inline">
                                        <button class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i
                                                class="fa-solid fa-pen-to-square"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website <?= date('Y') ?></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    {{-- <script src="{{ $Chart->cdn() }}"></script>
    {{ $Chart->script() }} --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="/admin/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/admin/assets/demo/chart-area-demo.js"></script>
    <script src="/admin/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="/admin/js/datatables-simple-demo.js"></script>
</body>

</html>
