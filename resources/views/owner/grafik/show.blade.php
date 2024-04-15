@extends('admin.layout.main')

@section('content')
    <h1>Grafik Jumlah Penjualan Barang Tahun {{ $tahun }}</h1>

    <div id="grafik" style="max-width: 95%;"></div>

    <script>
        // Your JavaScript code to render the chart
    </script>
@endsection
