@extends('NavbarMo')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Laporan Penjualan</h2>

        <form class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="startDate">Periode Dari</label>
                        <input type="date" class="form-control" id="startDate" name="startDate">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="endDate">Periode Sampai</label>
                        <input type="date" class="form-control" id="endDate" name="endDate">
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Bulan</th>
                        <th scope="col">Jumlah Transaksi</th>
                        <th scope="col">Jumlah Uang</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $months = [
                            'January' => ['transactions' => 120, 'amount' => 3000000],
                            'February' => ['transactions' => 110, 'amount' => 2800000],
                            'March' => ['transactions' => 150, 'amount' => 3500000],
                            'April' => ['transactions' => 130, 'amount' => 3200000],
                            'May' => ['transactions' => 140, 'amount' => 3300000],
                            'June' => ['transactions' => 170, 'amount' => 3700000],
                            'July' => ['transactions' => 160, 'amount' => 3600000],
                            'August' => ['transactions' => 180, 'amount' => 3900000],
                            'September' => ['transactions' => 190, 'amount' => 4000000],
                            'October' => ['transactions' => 200, 'amount' => 4200000],
                            'November' => ['transactions' => 210, 'amount' => 4300000],
                            'December' => ['transactions' => 220, 'amount' => 4500000],
                        ];
                    @endphp

                    @foreach ($months as $month => $data)
                        <tr>
                            <td>{{ $month }}</td>
                            <td>{{ $data['transactions'] }}</td>
                            <td>Rp {{ number_format($data['amount'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
