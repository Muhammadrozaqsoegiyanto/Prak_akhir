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
                Orders
                </button>
                <div class="collapse" id="orders-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('tampil-order') }}" class="fs-6 link-dark d-inline-flex text-decoration-none rounded">Data Order</a></li>
                    <li><a href="{{ url('input-order') }}" class="fs-6 link-dark d-inline-flex text-decoration-none rounded">Input Data Order</a></li>
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
    <main class="col-md-9 ms-auto col-lg-10 top-0 border border-1">
        {{-- {{ $errors->error->isNotEmpty() }} --}}
        <div class="container mt-5">
            @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('status-error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ session('status-error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @error('password')
        <div class="alert alert-danger alert-dismissible fade show text-center " role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">Ganti Password</div>
                        <form action="{{ url('update-password') }}" method="POST">
                            @csrf
                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="oldPasswordInput" class="form-label">Password Lama</label>
                                    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                        placeholder="Password Lama">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="newPasswordInput" class="form-label">Password Baru</label>
                                    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                        placeholder="Password Baru">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="confirmNewPasswordInput" class="form-label">Konfirmasi Password</label>
                                    <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                        placeholder="Konfirmasi Password">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">Ganti</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 mb-5 pb-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">Hapus Akun</div>
                            <div class="card-footer text-center">
                                <button class="btn btn-danger w-75 " data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Hapus</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('delete') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Password</label>
                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="recipient-name">
                            </div>
                            <div class="modal-footer">
                                <button  class="btn btn-danger">Hapus Akun</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebars.js"></script>
</body>
</html>
