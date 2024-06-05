@extends('dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gaji</title>
    <style>
        .card {
            width: 50%;
            margin: 0 auto;
            margin-top: 50px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            background-color: #f1faee;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
<div class="card">
    <h1>Edit Gaji</h1>
    
    <form method="POST" action="{{ route('gaji.update', ['id' => $gaji->id]) }}">
        @csrf
        @method('PUT')

        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="{{ $gaji->karyawan->nama }}"><br>

        <label for="jabatan">Jabatan:</label><br>
        <input type="text" id="jabatan" name="jabatan" value="{{ $gaji->karyawan->jabatan }}"><br>
        
        <label for="gaji">Gaji:</label><br>
        <input type="text" id="gaji" name="gaji" value="{{ $gaji->gaji }}"><br>
        
        <label for="bonus">Bonus:</label><br>
        <input type="text" id="bonus" name="bonus" value="{{ $gaji->bonus }}"><br>
        
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
@endsection
