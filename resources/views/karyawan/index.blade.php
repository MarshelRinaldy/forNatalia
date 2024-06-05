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
                <h1 class="m-2" style="font-size: 24px;" >Karyawan</h1>
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
                                <input type="text" name="keyword" id="searchInput" class="form-control" placeholder="Cari berdasarkan nama" value="{{ request('keyword') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Cari Karyawan</button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('karyawan.create') }}" class="btn btn-md btn-success mb-3">TAMBAH KARYAWAN</a>
                        <div class="table-responsive p-0">
                            <table class="table table-hover textnowrap" id="karyawanTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">ID Karyawan</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">No Telp</th>
                                        <th class="text-center">Jabatan</th>   
                                        <th class="text-center">Username</th>      
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($karyawan as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->nama }}</td>
                                        <td class="text-center">{{ $item->id_karyawan }}</td>
                                        <td class="text-center">{{ $item->email }}</td>
                                        <td class="text-center">{{ $item->noTelp }}</td>
                                        <td class="text-center">{{ $item->jabatan }}</td>
                                        <td class="text-center">{{ $item->username }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('karyawan.destroy', $item->id) }}" method="POST">
                                                <a href="{{ route('karyawan.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="12" class="text-center">Data Karyawan belum tersedia</td>
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
            const tableRows = document.querySelectorAll('#karyawanTable tbody tr');

            tableRows.forEach(row => {
                const namaText = row.cells[0].textContent.toLowerCase();
                if (namaText.includes(searchInput)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>

@endsection
