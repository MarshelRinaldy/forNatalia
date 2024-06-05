@extends('dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <h2 class="card-title text-center">Profil Pengguna</h2>
                <div class="card">
                    <img src="https://cdn.idntimes.com/content-images/community/2021/01/fromandroid-c3c8cf0d6fa248f6368c9d578c0f148d.jpg" class="card-img-top rounded-circle mx-auto mt-3" style="width: 100px; height: auto;" alt="Avatar">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $user->username }}</h5>
                        <p class="card-text">Email: {{ $user->email }}</p>
                        <p class="card-text">No Telp: {{ $user->noTelp }}</p>
                        <p class="card-text">Alamat: {{ $user->alamat }}</p>
                        <p class="card-text">Terdaftar sejak: {{ $user->created_at->format('d F Y') }}</p>
                
                        <a href="{{ route('profil.edit') }}" class="btn btn-primary btn-block">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection 
