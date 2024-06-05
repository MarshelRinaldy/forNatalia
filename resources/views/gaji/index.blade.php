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
                <h1 class="m-2" style="font-size: 24px;" >Gaji</h1>
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
                        <a href="{{ route('gaji.create') }}" class="btn btn-md btn-success mb-3">TAMBAH GAJI</a>
                        <div class="table-responsive p-0">
                            <table class="table table-hover textnowrap" id="karyawanTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jabatan</th>   
                                        <th class="text-center">Gaji</th>   
                                        <th class="text-center">Bonus</th>     
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($gaji as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->karyawan->nama }}</td>
                                        <td class="text-center">{{ $item->karyawan->jabatan }}</td>
                                        <td class="text-center">{{ $item->gaji }}</td>
                                        <td class="text-center">{{ $item->bonus }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('gaji.destroy', $item->id) }}" method="POST">
                                                <a href="{{ route('gaji.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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


@endsection
