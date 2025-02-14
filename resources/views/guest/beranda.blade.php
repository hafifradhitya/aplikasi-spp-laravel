<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang - Aplikasi SPP</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <style>
        .bg-light-blue {
            background-color: #e3f2fd;
        }
        .text-blue {
            color: #0d6efd;
        }
        .btn-light-blue {
            background-color: #90caf9;
            border-color: #90caf9;
            color: #fff;
        }
        .btn-light-blue:hover {
            background-color: #64b5f6;
            border-color: #64b5f6;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container-fluid bg-light-blue py-5">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold text-blue mb-4">Aplikasi SPP Online</h1>
                    <p class="lead mb-4">Selamat datang di sistem pembayaran SPP online. Kelola pembayaran SPP dengan mudah dan efisien.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2">Login</a>
                        <a href="#fitur" class="btn btn-light-blue px-4 py-2">Lihat Fitur</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <i class="bi bi-wallet2 text-blue" style="font-size: 4rem;"></i>
                            </div>
                            <h3 class="text-center text-blue mb-3">Kemudahan Pembayaran SPP</h3>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-blue me-2"></i>Pembayaran Online 24/7</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-blue me-2"></i>Riwayat Pembayaran Real-time</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-blue me-2"></i>Notifikasi Otomatis</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-blue me-2"></i>Laporan Digital</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</body>
</html>