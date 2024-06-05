<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Gaji</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        select, input[type="text"] {
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
        <h1>Create Gaji</h1>
        <form method="POST" action="{{ route('gaji.store') }}">
            @csrf
            <label for="nama_karyawan">Nama Karyawan:</label>
            <select id="nama_karyawan" name="nama_karyawan">
                @foreach($karyawan as $karyawanItem)
                    <option value="{{ $karyawanItem->id }}">{{ $karyawanItem->nama }}</option>
                @endforeach
            </select>

            <label for="gaji">Gaji:</label>
            <input type="text" id="gaji" name="gaji">
            
            <label for="bonus">Bonus:</label>
            <input type="text" id="bonus" name="bonus">

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
