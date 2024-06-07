@extends('NavbarMo')

@section('content')
    <style>
        body {
            background-image: url('/image/bg1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
        }
    </style>

    <div class="container mt-5 mb-5">
        <h2 class="text-center mb-4">Laporan Penjualan</h2>

        <form class="mb-4" method="GET" action="{{ route('laporan_penjualan') }}">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="startDate">Periode Dari</label>
                        <input type="date" class="form-control" id="startDate" name="startDate"
                            value="{{ $startDate }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="endDate">Periode Sampai</label>
                        <input type="date" class="form-control" id="endDate" name="endDate"
                            value="{{ $endDate }}">
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                </div>
            </div>
        </form>

        <div class="mb-4 text-right">
            <button class="btn btn-info" onclick="toggleChart()">Show Chart</button>
            <button class="btn btn-secondary" onclick="printReport()">Cetak Laporan</button>
        </div>

        <div id="chartContainer" style="display: none;">
            <canvas id="salesChart"></canvas>
        </div>

        @php
            $totalAmount = array_sum(array_column($report, 'amount'));
        @endphp

        <div id="reportContent" class="table-responsive mt-4">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Bulan</th>
                        <th scope="col">Jumlah Transaksi</th>
                        <th scope="col">Jumlah Uang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($report as $month => $data)
                        <tr>
                            <td>{{ $month }}</td>
                            <td>{{ $data['transactions'] }}</td>
                            <td>Rp {{ number_format($data['amount'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">Total</th>
                        <th>Rp {{ number_format($totalAmount, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let chartDisplayed = false;
        let salesChart = null;

        function toggleChart() {
            const chartContainer = document.getElementById('chartContainer');
            if (!chartDisplayed) {
                chartContainer.style.display = 'block';
                if (!salesChart) {
                    const ctx = document.getElementById('salesChart').getContext('2d');

                    const months = @json(array_keys($report));
                    const transactions = @json(array_column($report, 'transactions'));
                    const amounts = @json(array_column($report, 'amount'));

                    salesChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: months,
                            datasets: [{
                                label: 'Jumlah Transaksi',
                                data: transactions,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }, {
                                label: 'Jumlah Uang',
                                data: amounts,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
                chartDisplayed = true;
            } else {
                chartContainer.style.display = 'none';
                chartDisplayed = false;
            }
        }

        function printReport() {
            const printContents = document.getElementById('reportContent').innerHTML;
            const originalContents = document.body.innerHTML;

            document.body.innerHTML = `
                <div class="container mt-5">
                    <h2 class="text-center mb-4">Laporan Penjualan</h2>
                    <p><strong>Periode Dari:</strong> {{ $startDate }}</p>
                    <p><strong>Periode Sampai:</strong> {{ $endDate }}</p>
                    ${printContents}
                </div>
            `;

            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
