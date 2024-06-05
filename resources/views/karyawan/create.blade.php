<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Karyawan</title>
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
        <h1>Create Karyawan</h1>
        <form method="POST" action="{{ route('karyawan.store') }}">
            @csrf
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama">
            
            <label for="id_karyawan">ID Karyawan:</label>
            <input type="text" id="id_karyawan" name="id_karyawan">
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            
            <label for="noTelp">Nomor Telepon:</label>
            <input type="text" id="noTelp" name="noTelp">
            
            <label for="jabatan">Jabatan:</label>
            <input type="text" id="jabatan" name="jabatan">
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
