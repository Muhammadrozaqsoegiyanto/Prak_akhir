<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href="css/app.css" rel="stylesheet">
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
        <main class="content w-75 ms-auto me-5 mt-5">
            <div class="container p-0">
        <div class="row">
            <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Jumlah Penjualan</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="fa-solid fa-store"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $jumlah_penjualan }}</h1>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Jenis Produk Yang Tersedia</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="fa-solid fa-warehouse"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $jumlah_produk }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Jumlah Customer</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="fa-sharp fa-solid fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $jumlah_customer }}</h1>
                                    {{-- <div class="mb-0">
                                        <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
                                        <span class="text-muted">Since last week</span>
                                    </div> --}}
                                </div>
                            </div>
                            {{-- <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Data Pemesanan</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="shopping-cart"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">64</h1>
                                    <div class="mb-0">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                                        <span class="text-muted">Since last week</span>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xxl-7">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0"></h5>
                            Jumlah Penjualan Setiap Produk
                    </div>
                    <div class="card-body py-3">
                        <div class="chart chart-sm">
                            <canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="js/sidebars.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

        <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';
            // Area Chart Example
            var ctx = document.getElementById("myAreaChart");
            var _ydata=JSON.parse('{!! json_encode($jumlahs) !!}');
            var _xdata=JSON.parse('{!! json_encode($pesananCount) !!}');
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: _ydata,
                    datasets: [{
                    label: "Jumlah ",
                    lineTension: 0.3,
                    backgroundColor: "rgba(133,78,74,0.2)",
                    borderColor: "rgba(133,78,74,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(133,78,74,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(133,78,74,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: _xdata,
                    }],
                },
                options: {
                scales: {
                xAxes: [{
                    // time: {
                    //   unit: 'date'
                    // },
                    gridLines: {
                    display: false
                    },
                    ticks: {
                    maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                    min: 0,
                    max: {{ $jumlah_penjualan }},
                    maxTicksLimit: 5
                    },
                    gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                    }
                }],
                },
                legend: {
                display: false
                }
            }
            });

        </script>
        {{-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
                var gradient = ctx.createLinearGradient(0, 0, 0, 225);
                gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
                gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
                // Line chart
                new Chart(document.getElementById("chartjs-dashboard-line"), {
                    type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales ($)",
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: window.theme.primary,
                    data: [
                        ]
                    }]
                },
                options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false
                },
                hover: {
                    intersect: true
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 1000
                        },
                        display: true,
                        borderDash: [3, 3],
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }]
                }
            }
        });
    });
</script>
<script src="js/app.js"></script> --}}
</body>
</html>

