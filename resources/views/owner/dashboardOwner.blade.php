@extends('NavbarOwner')
@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron text-center">
                    <h1 class="display-4">Selamat Datang, Owner!</h1>
                    <p class="lead">Ini adalah halaman dashboard ownner. Dari sini, Anda dapat mengelola konten, pengguna,
                        dan berbagai aspek lainnya dari sistem.</p>
                    <hr class="my-4">
                    <p>Gunakan navigasi di atas untuk menelusuri berbagai fitur yang tersedia.</p>
                    <a class="btn btn-primary btn-lg" href="" role="button">Lihat Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection
