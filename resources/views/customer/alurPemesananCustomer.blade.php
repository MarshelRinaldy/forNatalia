<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alur Pemesanan Customer</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .tab-content>.tab-pane {
            display: none;
        }

        .tab-content>.active {
            display: block;
        }

        .card {
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="#belumBayar" data-toggle="tab">Pembayaran</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#diproses" data-toggle="tab">Diproses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#sudahSiap" data-toggle="tab">Siap Dipickup/Diantar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#sudahDikirim" data-toggle="tab">Sudah Dikirim/Dipickup</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#selesai" data-toggle="tab">Selesai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#dibatalkan" data-toggle="tab">Dibatalkan</a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Belum Bayar -->
            <div id="belumBayar" class="tab-pane fade show active">
                <h3 class="mb-4">Menu Pembayaran</h3>
                @foreach ($pemesanans as $pemesanan)
                    @if ($pemesanan->status_pemesanan == 'Belum Bayar')
                        <div class="card">
                            <div class="card-header bg-warning text-white">
                                No. Pemesanan: {{ $pemesanan->no_pemesanan }}
                            </div>
                            <div class="card-body">
                                <p><strong>Jumlah Pemesanan:</strong> {{ $pemesanan->jumlah_pemesanan }}</p>
                                <p><strong>Metode Pembayaran:</strong> {{ $pemesanan->metode_pembayaran }}</p>
                                <p><strong>Produk Dipesan:</strong></p>
                                <ul>
                                    @foreach ($pemesanan->detailPemesanans as $detail)
                                        <li>{{ $detail->produk->nama }} ({{ $detail->jumlah_produk }})</li>
                                    @endforeach
                                </ul>
                                <hr>
                                <p><strong>Total Harga:</strong> {{ $pemesanan->total_harga }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Diproses -->
            <div id="diproses" class="tab-pane fade">
                <h3 class="mb-4">Sedang Diproses</h3>
                @foreach ($pemesanans as $pemesanan)
                    @if ($pemesanan->status_pemesanan == 'diproses')
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                No. Pemesanan: {{ $pemesanan->no_pemesanan }}
                            </div>
                            <div class="card-body">
                                <p><strong>Status Pengantaran:</strong> {{ $pemesanan->status_pengantaran }}</p>
                                <p><strong>Produk Dipesan:</strong></p>
                                <ul>
                                    @foreach ($pemesanan->detailPemesanans as $detail)
                                        <li>{{ $detail->produk->nama }} (x{{ $detail->jumlah_produk }})</li>
                                        <p>{{ $detail->produk->deskripsi }}</p>
                                    @endforeach
                                </ul>
                                <hr>
                                @if ($pemesanan->status_pengantaran == 'delivery')
                                    <p>Biaya Ongkir : Rp.{{ number_format($pemesanan->biaya_ongkir, 0, ',', '.') }}</p>
                                @endif
                                <p><strong>Total Harga :
                                    </strong>Rp.{{ number_format($pemesanan->total_harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>


            <!-- Sudah Siap -->
            <div id="sudahSiap" class="tab-pane fade">
                <h3 class="mb-4">Sudah Bisa Diambil atau Sedang Diantar</h3>
                @foreach ($pemesanans as $pemesanan)
                    @if ($pemesanan->status_pemesanan == 'siap dipickup')
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                No. Pemesanan: {{ $pemesanan->no_pemesanan }}
                            </div>
                            <div class="card-body">
                                <p><strong>Status Pengantaran:</strong> {{ $pemesanan->status_pengantaran }}</p>
                                <p><strong>Produk Dipesan:</strong></p>
                                <ul>
                                    @foreach ($pemesanan->detailPemesanans as $detail)
                                        <li>{{ $detail->produk->nama }} (x{{ $detail->jumlah_produk }})</li>
                                        <p>{{ $detail->produk->deskripsi }}</p>
                                    @endforeach
                                </ul>
                                <hr>
                                @if ($pemesanan->status_pengantaran == 'delivery')
                                    <p>Biaya Ongkir : Rp.{{ number_format($pemesanan->biaya_ongkir, 0, ',', '.') }}</p>
                                @endif
                                <p><strong>Total Harga :
                                    </strong>Rp.{{ number_format($pemesanan->total_harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Sudah Dipickup -->
            <div id="sudahDikirim" class="tab-pane fade">
                <h3 class="mb-4">Barang Sudah Diterima</h3>
                @foreach ($pemesanans as $pemesanan)
                    @if ($pemesanan->status_pemesanan == 'sudah dipickup')
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                No. Pemesanan: {{ $pemesanan->no_pemesanan }}
                            </div>
                            <div class="card-body">
                                <p><strong>Status Pengantaran:</strong> {{ $pemesanan->status_pengantaran }}</p>
                                <p><strong>Produk Dipesan:</strong></p>
                                <ul>
                                    @foreach ($pemesanan->detailPemesanans as $detail)
                                        <li>{{ $detail->produk->nama }} (x{{ $detail->jumlah_produk }})</li>
                                        <p>{{ $detail->produk->deskripsi }}</p>
                                    @endforeach
                                </ul>
                                <hr>
                                @if ($pemesanan->status_pengantaran == 'delivery')
                                    <p>Biaya Ongkir : Rp.{{ number_format($pemesanan->biaya_ongkir, 0, ',', '.') }}</p>
                                @endif
                                <p><strong>Total Harga :</strong>
                                    Rp.{{ number_format($pemesanan->total_harga, 0, ',', '.') }}</p>
                                <div class="text-center">
                                    <form action="{{ route('barang_sudah_diterima', $pemesanan->id) }}" method="POST">
                                        @method('patch')
                                        @csrf
                                        <button type="submit" class="btn btn-success">Selesai</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>


            <!-- Selesai -->
            <div id="selesai" class="tab-pane fade">
                <h3 class="mb-4">History Pesanan yang sudah Selesai</h3>
                @foreach ($pemesanans as $pemesanan)
                    @if ($pemesanan->status_pemesanan == 'selesai')
                        <div class="card">
                            <div class="card-header bg-secondary text-white">
                                No. Pemesanan: {{ $pemesanan->no_pemesanan }}
                            </div>
                            <div class="card-body">
                                <p><strong>Status Pengantaran:</strong> {{ $pemesanan->status_pengantaran }}</p>
                                <p><strong>Produk Dipesan:</strong></p>
                                <ul>
                                    @foreach ($pemesanan->detailPemesanans as $detail)
                                        <li>{{ $detail->produk->nama }} (x{{ $detail->jumlah_produk }})</li>
                                        <p>{{ $detail->produk->deskripsi }}</p>
                                    @endforeach
                                </ul>
                                <hr>
                                @if ($pemesanan->status_pengantaran == 'delivery')
                                    <p>Biaya Ongkir : Rp.{{ number_format($pemesanan->biaya_ongkir, 0, ',', '.') }}</p>
                                @endif
                                <p><strong>Total Harga :
                                    </strong>Rp.{{ number_format($pemesanan->total_harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Dibatalkan -->
            <div id="dibatalkan" class="tab-pane fade">
                <h3 class="mb-4">Dibatalkan</h3>
                @foreach ($pemesanans as $pemesanan)
                    @if ($pemesanan->status_pemesanan == 'Dibatalkan')
                        <div class="card">
                            <div class="card-header bg-danger text-white">
                                No. Pemesanan: {{ $pemesanan->no_pemesanan }}
                            </div>
                            <div class="card-body">
                                <p><strong>Jumlah Pemesanan:</strong> {{ $pemesanan->jumlah_pemesanan }}</p>
                                <p><strong>Alasan Pembatalan:</strong> {{ $pemesanan->alasan_pembatalan }}</p>
                                <p><strong>Produk Dipesan:</strong></p>
                                <ul>
                                    @foreach ($pemesanan->detailPemesanans as $detail)
                                        <li>{{ $detail->produk->nama }} ({{ $detail->jumlah_produk }})</li>
                                        <li>{{ $detail->produk->deskripsi }}</li>
                                    @endforeach
                                </ul>
                                <hr>
                                <p><strong>Total Harga:</strong> {{ $pemesanan->total_harga }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
