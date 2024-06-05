@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@section('content')
<div class="container mt-5">
        <h2 class="text-center mb-4">Histori Pesanan</h2>

        <!-- Form Pencarian -->
        <form class="mb-3">
            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari berdasarkan nama produk">
                <div class="input-group-append">
                    <button type="button" class="btn btn-primary" onclick="search()">Cari</button>
                </div>
            </div>
        </form>

        <!-- Tabel Histori -->
        <table id="historyTable" class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Nama Customer</th>
                <th class="text-center">Nama Produk</th>
                <th class="text-center">Tanggal Pemesanan</th> 
                <th class="text-center">Jumlah Item</th>  
                <th class="text-center">Harga</th> 
                <th class="text-center">Jenis Pemesanan</th>      
            </tr>
        </thead>
            <tbody>
                @forelse ($pemesanans as $item )
                    <tr>
                        <td class="text-center">{{ $item->user->username }}</td>
                        <td class="text-center">{{ $item->nama }}</td>
                        <td class="text-center">{{ $item->tglPesan }}</td>
                        <td class="text-center">{{ $item->jumlah }}</td>
                        <td class="text-center">{{ $item->hargaPesanan }}</td>
                        <td class="text-center">{{ $item->jenis }}</td>
                       
                        
                    </tr>
                        @empty
                        <tr>
                    <td colspan="6" class="text-center">Tidak ada data pemesanan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script>
       
        // Fungsi untuk mencari berdasarkan nama produk
        function search() {
            const keyword = document.getElementById("searchInput").value.toLowerCase();
            const filteredData = dummyData.filter(item => item.nama_produk.toLowerCase().includes(keyword));
            displayData(filteredData);
        }

        // Menampilkan data pada tabel
        function displayData(data) {
            const tableBody = document.getElementById("historyTable").getElementsByTagName("tbody")[0];
            tableBody.innerHTML = "";

            data.forEach((item, index) => {
                const row = tableBody.insertRow(index);
                row.insertCell(0).textContent = index + 1;
                row.insertCell(1).textContent = item.nama_produk;
                row.insertCell(2).textContent = item.tanggal_pesanan;
                row.insertCell(3).textContent = item.total_pesanan;
            });
        }
    </script>
</body>
@endsection
</html>
