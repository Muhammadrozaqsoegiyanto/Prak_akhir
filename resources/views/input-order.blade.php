<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Input Data Customer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dashboard.css" rel="stylesheet">
        <link href="css/sidebars.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/b0cef64d70.js" crossorigin="anonymous"></script>
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
            {{-- </div> --}}
        @endif





    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card w-50">
            <div class="card-header text-center font-weight-bold">
                Input Data Order
            </div>
            <div class="card-body">
                <form action="{{ url('kirim-order') }}" method="post" >
                    @csrf
                    <div class="form-floating mb-3">
                        {{-- <span class="input-group-text">Nama Produk</span> --}}
                        <select id="floatingSelect" class="form-control @error('produk_id') is-invalid @enderror" aria-label="produk_id" name="produk_id">
                            @foreach ($produk as $item)
                                <option
                                    value="{{ $item->id }}"
                                    {{ old('produk_id') == $item->id? 'selected' : null }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Nama Produk</label>
                        @error('produk_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Kode Pesanan</span>
                        <input type="text" class="form-control @error('kode_pemesanan') is-invalid @enderror"  value="{{ old('kode_pemesanan') }}" name="kode_pemesanan" placeholder="" aria-label="kode_pemesanan" aria-describedby="basic-addon1">
                        @error('kode_pemesanan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">Jumlah Pesanan</span>
                        <input type="number" name="jumlah" min="0" class="form-control @error('jumlah') is-invalid @enderror"  value="{{ old('jumlah') }}" placeholder="" aria-label="jumlah" aria-describedby="basic-addon2">
                        @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="tanggal_pemesanan">Tanggal Pemesanan</span>
                        <input type="date" name="tanggal_pemesanan" class="form-control @error('tanggal_pemesanan') is-invalid @enderror"  value="{{ old('tanggal_pemesanan') }}" id="basic-url" aria-describedby="tanggal_pemesanan">
                        @error('tanggal_pemesanan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Tanggal Pengiriman</span>
                        <input type="date" name="tanggal_pengiriman" min="0" class="form-control @error('tanggal_pengiriman') is-invalid @enderror"  value="{{ old('tanggal_pengiriman') }}" aria-label="tanggal_pengiriman">
                        @error('tanggal_pengiriman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">No Resi</span>
                        <input type="text" name="resi" class="form-control @error('resi') is-invalid @enderror"  value="{{ old('resi') }}" placeholder="" aria-label="resi">
                        @error('resi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Kurir</span>
                        <input type="text" name="kurir" class="form-control @error('kurir') is-invalid @enderror"  value="{{ old('kurir') }}" placeholder="" aria-label="kurir">
                        @error('kurir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
            </div>
        </div>
    </div>
</main>




<!--=================================== Akhir data untuk diganti ===================================== -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebars.js"></script>
</body>
</html>
