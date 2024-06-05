<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resep</title>
    <style>
        .card {
            width: 50%;
            margin: 0 auto;
            margin-top: 50px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: left; 
            background-color: #f1faee;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            width: 100px; 
        }

        select,
        input[type="text"],
        textarea {
            width: calc(100% - 110px); 
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group {
            margin-bottom: 20px;
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
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h1>Edit Resep</h1>
                    <div class="card-body">
                        <form method="POST" action="{{ isset($resep) ? route('resep.update', ['resep' => $resep->id]) : '#' }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="namaKategori">Nama Kategori</label>
                                <select class="form-control" id="namaKategori" name="namaKategori">
                                    <option value="">Pilih Nama Kategori</option>
                                    @foreach($kategoriOptions as $option)
                                        <option value="{{ $option }}" {{ isset($resep) && $resep->namaKategori == $option ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="namaProduk">Nama Produk</label>
                                <select class="form-control" id="namaProduk" name="namaProduk">
                                    <option value="">Pilih Nama Produk</option>
                                    @foreach($produkOptions as $option)
                                        <option value="{{ $option }}" {{ isset($resep) && $resep->namaProduk == $option ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="dynamicInput">
                                @if(isset($resep))
                                    @foreach(explode(',', $resep->namaBahan) as $index => $bahan)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="namaBahan">Nama Bahan</label>
                                                    <select class="form-control" name="namaBahan[]">
                                                        <option value="">Pilih Nama Bahan</option>
                                                        @foreach($bahanOptions as $option)
                                                            <option value="{{ $option }}" {{ $bahan == $option ? 'selected' : '' }}>{{ $option }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="kuantitas">Kuantitas</label>
                                                    <input type="text" class="form-control" name="kuantitas[]" value="{{ explode(',', $resep->kuantitas)[$index] }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-danger" onclick="removeInput(this)">Hapus</button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ isset($resep) ? $resep->deskripsi : '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="waktuMemasak">Waktu Memasak</label>
                                <input type="text" class="form-control" id="waktuMemasak" name="waktuMemasak" value="{{ isset($resep) ? $resep->waktuMemasak : '' }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function addInput() {
        // Dapatkan elemen yang akan disalin
        var existingRow = document.querySelector('#dynamicInput .row');

        // Salin elemen
        var newRow = existingRow.cloneNode(true);

        // Kosongkan nilai input
        newRow.querySelector('select').selectedIndex = 0;
        newRow.querySelector('input[type="text"]').value = '';

        // Tambahkan baris baru ke dalam formulir
        document.getElementById('dynamicInput').appendChild(newRow);
    }

    function removeInput(btn) {
        btn.closest('.row').remove();
    }
</script>

</body>
</html>
