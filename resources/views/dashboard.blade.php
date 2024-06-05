<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AtmaKitchen</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <style>
        .navbar {
            background-color: #ffe5d8;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .navbar-nav .nav-link {
            color: #333;
            font-size: 1rem;
            font-weight: 500;
            margin: 0 1rem;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff;
        }

        .navbar-toggler-icon {
            border: none;
            background-color: #007bff;
        }

        .navbar-toggler {
            border: none;
            outline: none;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">AtmaKitchen</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="{{ url('home') }}" class="nav-link">
                                <i class="bi bi-house-door"></i> Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('tampilan_alur_pemesanan_customer') }}" class="nav-link">
                                <i class="bi bi-person"></i> Daftar Pesanan
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" ariahaspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" arialabelledby="userDropdown">
                                <div class="text-center">
                                    <img src="https://cdn.idntimes.com/content-images/community/2021/01/fromandroid-c3c8cf0d6fa248f6368c9d578c0f148d.jpg"
                                        class="rounded-circle mb-2" style="width: 100px; height: auto;"
                                        alt="Avatar" />
                                    <h5 class="mb-2"><strong>{{ Auth::user()->username }}</strong></h5>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                </div>

                                <div class="dropdown-divider"></div>
                                <div>
                                    <a class="dropdown-item" href="{{ route('profil.index') }}"><i
                                            class="fa fa-user"></i> Profile</a>
                                    <a class="dropdown-item" href="{{ url('history') }}"><i class="fas fa-history"></i>
                                        History</a>
                                    <a class="dropdown-item" href="#" onclick="confirmLogout()"><i
                                            class="fas fa-sign-out-alt"></i> Logout</a>
                                    <a class="dropdown-item" href="{{ route('change-password-view') }}"><i
                                            class="fas fa-key"></i> Ubah Password</a>

                                </div>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->


        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="text-center py-3">
                <p>&copy; <?php echo date('Y'); ?> AtmaKitchen. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmLogout() {
            if (confirm("Apakah Anda yakin ingin keluar?")) {
                window.location.href = "{{ route('actionLogout') }}";
            } else {
                // Jika pengguna membatalkan, tidak melakukan apa-apa
            }
        }
    </script>
</body>

</html>
