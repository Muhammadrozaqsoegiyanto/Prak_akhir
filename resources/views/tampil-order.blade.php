<!doctype html>
<html lang="en">
    <head>
        <script src="https://kit.fontawesome.com/b0cef64d70.js" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Produk</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dashboard.css" rel="stylesheet">
        <link href="css/sidebars.css" rel="stylesheet">
    </head>
<body>
    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-4 fs-4 fw-bold">Data Informasi</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <form action="{{ url('logout') }}" method="post">
                @csrf
                <button class="btn nav-link px-5 fw-bold">Keluar</button>
                </form>
            </div>
        </div>
        </header>
        <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <a href="{{ url('dashboard') }}" class="btn d-inline-flex align-items-center fw-bold fs-5">
                    Dashboard
                    </a>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Pelanggan
                    </button>
                    <div class="collapse" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{ url('tampil-customer') }}" class="fs-6 link-dark d-inline-flex text-decoration-none rounded">Data Pelanggan</a></li>
                        <li><a href="{{ url('input-customer') }}" class="fs-6 link-dark d-inline-flex text-decoration-none rounded">Input Data Pelanggan</a></li>
                    </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    Pemesanan
                    </button>
                    <div class="collapse" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{ url('tampil-order') }}" class="fs-6 link-dark d-inline-flex text-decoration-none rounded">Data Pemesanan</a></li>
                        <li><a href="{{ url('input-order') }}" class="fs-6 link-dark d-inline-flex text-decoration-none rounded">Input Data Pemesanan</a></li>
                    </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#produk-collapse" aria-expanded="false">
                    Produk
                    </button>
                    <div class="collapse" id="produk-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{ url('tampil-produk') }}" class="fs-6 link-dark d-inline-flex text-decoration-none rounded">Data Produk</a></li>
                        <li><a href="{{ url('input-produk') }}" class="fs-6 link-dark d-inline-flex text-decoration-none rounded">Input Data Produk</a></li>
                    </ul>
                    </div>
                </li>
                <li class="border-top my-3"></li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    Akun
                    </button>
                    <div class="collapse" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{ url('setting') }}" class="fs-6 link-dark d-inline-flex text-decoration-none rounded">Pengaturan</a></li>
                    </ul>
                    </div>
                </li>
                </ul>
            </div>
        </nav>
        </div>
        </div>
    <!-- ============================ Data Untuk Diganti ================================-->
    <main class="col-md-9 ms-auto col-lg-10 top-0 border border-1">
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('status-deleted'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('status-deleted') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card w-100">
            <div class="card-header text-center font-weight-bold">
                Daftar Data Pemesanan
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr class="table-primary">
                            <th class=" text-center" style="width: 10%"> Nama Produk</th>
                            <th class=" text-center" style="width: 15%"> Kode Pesanan</th>
                            <th class=" text-center" style="width: 15%"> Jumlah Pesanan</th>
                            <th class=" text-center" style="width: 15%"> Tanggal Pemesanan</th>
                            <th class=" text-center" style="width: 15%"> Tanggal Pengiriman</th>
                            <th class=" text-center" style="width: 15%"> No Resi</th>
                            <th class=" text-center" style="width: 10%"> Kurir</th>
                            <th class=" text-center" colspan=2 style="width: 10%"> Aksi</th>
                        </tr>
                    </thead>
                    @foreach($data as $isi)
                    <tr>
                        <td class="table-info text-center" style="width: 10%">
                            {{ $isi -> nama_produk }}
                        </td>
                        <td class="table-info text-center" style="width: 15%">
                            {{ $isi -> kode_pemesanan }}
                        </td>
                        <td class="table-info text-center" style="width: 15%">
                            {{ $isi -> jumlah }}
                        </td>
                        </td>
                        <td class="table-info text-center" style="width: 15%">
                            {{ $isi -> tanggal_pemesanan }}
                        </td>
                        <td class="table-info text-center" style="width: 15%">
                            {{ $isi -> tanggal_pengiriman }}
                        </td>
                        <td class="table-info text-center" style="width: 15%">
                            {{ $isi -> resi }}
                        </td>
                        <td class="table-info text-center" style="width: 10%">
                            {{ $isi -> kurir }}
                        </td>
                        <td class="table-info text-center" style="width: 5%">
                            <a href="{{ url('delete-order')}}/{{ $isi->kode_pemesanan }}">
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </a>
                        </td>
                        <td class="table-info text-center" style="width: 5%">
                            <a href="{{url('edit-order')}}/{{$isi->kode_pemesanan}}">
                                <button type="submit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </table>
            </div>
        </div>
        </div>
    </div>
</main>
<!--=================================== Akhir data untuk diganti ===================================== -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebars.js"></script>
</body>
</html>
