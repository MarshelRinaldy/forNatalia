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
        <h2 class="text-center mb-4">Laporan Pemakaian Bahan Baku</h2>

        {{-- Form untuk menampilkan laporan --}}
        <form id="reportForm" class="mb-4" method="GET" action="{{ route('laporan_bahan_baku_digunakan') }}">
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
                    <button type="submit" class="btn btn-primary" id="showReportBtn">Tampilkan Laporan</button>
                </div>
            </div>
        </form>

        {{-- Tombol cetak laporan --}}
        <div class="mb-4 text-right">
            <button class="btn btn-secondary" onclick="printReport()">Cetak Laporan</button>
        </div>

        {{-- Tabel laporan --}}
        <div id="reportContent" class="table-responsive mt-4">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nama Bahan</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Digunakan</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop untuk menampilkan data laporan --}}
                    @foreach ($report as $data)
                        <tr>
                            <td>{{ $data['nama'] }}</td>
                            <td>{{ $data['satuan'] }}</td>
                            <td>{{ $data['totalPemakaian'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Fungsi untuk menampilkan laporan saat pertama kali dimuat
        window.onload = function() {
            document.getElementById('showReportBtn').click(); // Klik tombol "Tampilkan Laporan" secara otomatis
        };

        // Fungsi untuk mengirimkan permintaan dan menampilkan laporan
        document.getElementById('showReportBtn').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('reportContent').innerHTML =
                '<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Loading...</div>';
            const form = document.querySelector('#reportForm');
            const formData = new FormData(form);
            fetch(form.action + '?' + new URLSearchParams(formData), {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(data => {
                    const parser = new DOMParser();
                    const newDoc = parser.parseFromString(data, 'text/html');
                    const reportContent = newDoc.getElementById('reportContent').innerHTML;
                    document.getElementById('reportContent').innerHTML = reportContent;
                })
                .catch(error => console.error('Error:', error));
        });

        // Fungsi untuk mencetak laporan
        function printReport() {
            const printContents = document.getElementById('reportContent').innerHTML;
            const originalContents = document.body.innerHTML;

            document.body.innerHTML = `
                <div class="container mt-5">
                    <h2 class="text-center mb-4">Laporan Pemakaian Bahan Baku</h2>
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
