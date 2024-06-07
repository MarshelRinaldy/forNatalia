@extends('NavbarAdmin')
@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="container mt-5">
        <h2 class="text-center mb-4">Pesanan Yang Diproses</h2>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">No Pesanan</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemesanans as $pemesanan)
                        <tr>
                            <td>{{ $pemesanan->user ? $pemesanan->user->username : 'Unknown User' }}</td>
                            <td>{{ $pemesanan->tanggal_pemesanan }}</td>
                            <td>{{ $pemesanan->no_pemesanan }}</td>
                            <td>{{ $pemesanan->status_pemesanan }}</td>
                            <td class="text-center">
                                <form action="{{ route('confirm_pesanan_diproses', $pemesanan->id) }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <button type="submit" class="btn btn-success" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Confirm Order">
                                        <i class="bi bi-check-circle"></i> Confirm
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script>
   
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
