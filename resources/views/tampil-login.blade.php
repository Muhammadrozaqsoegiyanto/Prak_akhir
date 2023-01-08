<!doctype html>
<html lang="en">
  <head>
  	<title>Halaman Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="section mt-5">
        @if(session('status'))
        <div class="alert alert-warning alert-dismissible fade show  text-center" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('status-error'))
    <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50" role="alert">
        {{ session('status-error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
                    <div class="login-wrap py-5">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/bg.png);"></div>
                        <h3 class="text-center mb-0">Selamat Datang</h3>
                        <p class="text-center">Silahkan Masuk</p>
						<form action="{{ url('login') }}" method="post" class="login-form">
                            @csrf
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn form-control btn-primary rounded submit px-3">Masuk</button>
                            </div>
                        </form>
                        <div class="w-100 text-center mt-4 text">
                            <p class="mb-0">Tidak Memiliki Akun?</p>
                            <a href="{{ url('register') }}">Daftar disini!!!</a>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>


	</body>
</html>

