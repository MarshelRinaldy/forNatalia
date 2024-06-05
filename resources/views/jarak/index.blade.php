@extends('dashboard')

@section('content')
<style>
    img {
        height: 250px;
        width: 200px;
    }

    .text-center {
        align-items: center;
    }
</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2" style="font-size: 24px;">Jarak</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="jarakTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Customer</th>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Tanggal Pemesanan</th> 
                                        <th class="text-center">Jumlah Item</th>  
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Jarak</th>
                                        <th class="text-center">Total Biaya</th>
                                        <th class="text-center">Ongkir</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pemesanans as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->user->username }}</td>
                                        <td class="text-center">{{ $item->nama }}</td>
                                        <td class="text-center">{{ $item->tglPesan }}</td>
                                        <td class="text-center">{{ $item->jumlah }}</td>
                                        <td class="text-center">{{ $item->hargaPesanan }}</td>
                                        <td class="text-center">{{ optional($item->jarak)->jarak ?? 'N/A' }}</td>
                                        <td class="text-center">{{ optional($item->jarak)->totalBiaya ?? 'N/A' }}</td>
                                        <td class="text-center">{{ optional($item->jarak)->ongkir ?? 'N/A' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('jarak.create', ['id_pemesanan' => $item->id]) }}" class="btn btn-sm btn-primary">Add</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Data Inputan belum tersedia</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
