<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Halaman Sign Up</title>
</head>
<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Daftar</p>
                                    <form action="{{url('registrasi-user')}}" method="post" class="mx-1 mx-md-4">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text"
                                                name="name"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama') }}"
                                                id="floatingInput"
                                                placeholder="Nama" >
                                                <label class="form-label" for="form3Example1c">Nama</label>
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text"
                                                name="username"
                                                class="form-control @error('username') is-invalid @enderror"
                                                value="{{ old('username') }}"
                                                id="floatingInput"
                                                placeholder="Username" >
                                                <label class="form-label" for="form3Example1c">Username</label>
                                                @error('username')
                                                    <div class="invalid-feedback">
                                                            {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email"
                                                name="email"
                                                class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}"
                                                id="floatingInput"
                                                placeholder="Email Address">
                                                <label class="form-label" for="form3Example3c">Email</label>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password"
                                                name="password"
                                                class="form-control @error('password') is-invalid @enderror"  value="{{ old('password') }}"
                                                id="floatingPassword"
                                                placeholder="Password">
                                                <label class="form-label" for="form3Example4c">Password</label>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password"
                                                name="konfirmasi_password"
                                                class="form-control @error('konfirmasi_password') is-invalid @enderror"  value="{{ old('konfirmasi_password') }}"
                                                id="floatingPassword"
                                                placeholder="Password">
                                                <label class="form-label" for="form3Example4cd">Konfirmasi Password</label>
                                                @error('konfirmasi_password')
                                                    <div class="invalid-feedback">
                                                            {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" class="btn btn-primary btn-lg">Daftar Sekarag</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>








