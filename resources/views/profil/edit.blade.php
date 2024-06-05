@extends('dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Edit Profil</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('profil.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                            </div>

                            <div class="form-group">
                                <label for="noTelp">No Telepon:</label>
                                <input type="text" class="form-control" id="noTelp" name="noTelp" value="{{ $user->noTelp }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $user->alamat }}">
                            </div>

                            
                            <!-- Tambahkan field lainnya sesuai kebutuhan -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>

                

                <div class="card mt-4">
                    <img src="https://cdn.idntimes.com/content-images/community/2021/01/fromandroid-c3c8cf0d6fa248f6368c9d578c0f148d.jpg" class="card-img-top rounded-circle mx-auto mt-3" style="width: 100px; height: auto;" alt="Avatar">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $user->username }}</h5>
                        <p class="card-text">Email: {{ $user->email }}</p>
                        <p class="card-text">No Telepon: {{ $user->noTelp }}</p>
                        <p class="card-text">Alamat: {{ $user->alamat }}</p>
                        <p class="card-text">Terdaftar sejak: {{ $user->created_at->format('d F Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection