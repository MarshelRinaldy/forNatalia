<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Resep</title>
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
                <h1>Create Resep</h1>
                    <div class="card-body">
                        <form action="{{ route('resep.store') }}" method="POST" id="resepForm">
                            @csrf
                            <div class="form-group">
                                <label for="namaKategori">Nama Kategori</label>
                                <select class="form-control" id="namaKategori" name="namaKategori" required>
                                    <option value="">Pilih Nama Kategori</option>
                                    <option value="Cake"> Cake</option>
                                    <option value="Roti"> Roti</option>
                                    <option value="Minuman"> Minuman</option>
                                    <option value="Titipan"> Titipan</option>
                                    <option value="Hampers"> Hampers</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="namaProduk">Nama Produk</label>
                                <select class="form-control" id="namaProduk" name="namaProduk" required>
                                <option value="">Pilih Nama Produk</option>
                                <option value="Lapis Legit">Lapis Legit</option>
                                <option value="Lapis Surabaya">Lapis Surabaya</option>
                                <option value="Brownies">Brownies</option>
                                <option value="Mandarin">Mandarin</option>
                                <option value="Spikoe">Spikoe</option>
                                <option value="Roti Sosis">Roti Sosis</option>
                                <option value="MilkBun">MilkBun</option>
                                <option value="Roti Keju">Roti Keju</option>
                                <option value="Choco Creamy Latte">Choco Creamy Latte</option>
                                <option value="Matcha Creamy Latte">Matcha Creamy Latte</option>
                                <option value="Keripik Kentang 250gr">Keripik Kentang 250gr</option>
                                <option value="Kopi Luwak Bubuk 250gr">Kopi Luwak Bubuk 250gr</option>
                                <option value="Matcha Organik Bubuk 100gr">Matcha Organik Bubuk 100gr</option>
                                <option value="Chocolate Bar 100gr">Chocolate Bar 100gr</option>
                                <option value="Paket A">Paket A</option>
                                <option value="Paket B">Paket B</option>
                                <option value="Paket C">Paket C</option>
                                </select>
                            </div>

                            <div id="dynamicInput">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="namaBahan">Nama Bahan</label>
                                            <select class="form-control" name="namaBahan[]" required>
                                            <option value="">Pilih Nama Bahan</option>
                                            <option value="Butter">Butter</option>
                                            <option value="Creamer">Creamer</option>
                                            <option value="Telur">Telur</option>
                                            <option value="Gula pasir">Gula pasir</option>
                                            <option value="Susu bubuk">Susu bubuk</option>
                                            <option value="Tepung terigu">Tepung terigu</option>
                                            <option value="Garam">Garam</option>
                                            <option value="Coklat bubuk">Coklat bubuk</option>
                                            <option value="Selai strawberry">Selai strawberry</option>
                                            <option value="Coklat batang">Coklat batang</option>
                                            <option value="Minyak goreng">Minyak goreng</option>
                                            <option value="Tepung maizena">Tepung maizena</option>
                                            <option value="Baking powder">Baking powder</option>
                                            <option value="Kacang kenari">Kacang kenari</option>
                                            <option value="Ragi">Ragi</option>
                                            <option value="Kuning telur">Kuning telur</option>
                                            <option value="Susu cair">Susu cair</option>
                                            <option value="Sosis blackpapper">Sosis blackpapper</option>
                                            <option value="Whipped cream">Whipped cream</option>
                                            <option value="Susu full cream">Susu full cream</option>
                                            <option value="Keju mozzarella">Keju mozzarella</option>
                                            <option value="Matcha bubuk">Matcha bubuk</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="kuantitas">Kuantitas</label>
                                            <input type="text" class="form-control" name="kuantitas[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-secondary" onclick="addInput()">Tambah</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="waktuMemasak">Waktu Memasak</label>
                                <input type="text" class="form-control" id="waktuMemasak" name="waktuMemasak" required>
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
