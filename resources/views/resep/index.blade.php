@extends('dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2" style="font-size: 24px;">Resep</h1>
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
                        <form id="searchForm" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="keyword" id="searchInput" class="form-control" placeholder="Cari berdasarkan nama produk" value="{{ request('keyword') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Cari Resep</button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('resep.create') }}" class="btn btn-md btn-success mb-3">MEMBUAT RESEP</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Kategori</th>
                                        <th>Nama Produk</th>
                                        <th>Nama Bahan</th>
                                        <th>Kuantitas</th>
                                        <th>Deskripsi</th>
                                        <th>Waktu Memasak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($resep as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->namaKategori }}</td>
                                        <td class="text-center">{{ $item->namaProduk }}</td>
                                        <td class="text-center">{{ $item->namaBahan }}</td>
                                        <td class="text-center">{{ $item->kuantitas }}</td>
                                        <td class="text-center">{{ $item->deskripsi }}</td>
                                        <td class="text-center">{{ $item->waktuMemasak }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('resep.destroy', $item->id) }}" method="POST">
                                                <a href="{{ route('resep.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="12" class="text-center">Data Resep belum tersedia</td>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchForm = document.getElementById('searchForm');
        searchForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');

            tableRows.forEach(row => {
                const namaProduk = row.cells[0].textContent.toLowerCase();
                if (namaProduk.includes(searchInput)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>

@endsection
