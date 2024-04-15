
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>LAPORAN JUMLAH PENJUALAN BARANG</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/laporan.css') }}" />
    </head>
    <body>
<div id="title-perusahaan">
    TOKO ONESHOP BANDAR LAMPUNG
</div>

<div id="title-alamat">
    Alamat: Jalan Kapten Abdul Haq, Jalur 2 Damri
</div>

<div style="margin:-60px 0 0 100px">
    <img src="{{ asset('assets/img/logo.png') }}" height="60">
</div>

<hr><br>

<div id="title">
    LAPORAN JUMLAH PENJUALAN BARANG
</div>

<div id="title-tanggal">
    @php
if (isset($_GET['bulan'])) {
    if ($_GET['bulan']=='1') {
        $bulan = "Januari";
    } elseif ($_GET['bulan']=='2') {
        $bulan = "Februari";
    } elseif ($_GET['bulan']=='3') {
        $bulan = "Maret";
    } elseif ($_GET['bulan']=='4') {
        $bulan = "April";
    } elseif ($_GET['bulan']=='5') {
        $bulan = "Mei";
    } elseif ($_GET['bulan']=='6') {
        $bulan = "Juni";
    } elseif ($_GET['bulan']=='7') {
        $bulan = "Juli";
    } elseif ($_GET['bulan']=='8') {
        $bulan = "Agustus";
    } elseif ($_GET['bulan']=='9') {
        $bulan = "September";
    } elseif ($_GET['bulan']=='10') {
        $bulan = "Oktober";
    } elseif ($_GET['bulan']=='11') {
        $bulan = "November";
    } elseif ($_GET['bulan']=='12') {
        $bulan = "Desember";
    }

    $tahun = $_GET['tahun'];
} else {
    $bulan = "";
    $tahun = "";
}
@endphp
    Bulan {{ $bulan }} {{ $tahun }}
</div>

<br>

<div id="isi">
    <table width="100%" border="0.5" cellpadding="0" cellspacing="0">
        <tr class="tr-title">
            <th height="25" align="center" valign="middle">No.</th>
            <th height="25" align="center" valign="middle">Nama Barang</th>
            <th height="25" align="center" valign="middle">Harga</th>
            <th height="25" align="center" valign="middle">Jumlah</th>
            <th height="25" align="center" valign="middle">Total Pembayaran</th>
        </tr>

        @foreach ($query as $i => $data)
        <tr>
            <td width="50" height="14" align="center" valign="middle">{{ $i + 1 }}</td>
            <td style="padding-left:5px;" width="210" height="14" valign="middle">{{ $data->nama_barang }}</td>
            <td style="padding-right:5px;" width="150" height="14" align="right" valign="middle">Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
            <td width="120" height="14" align="center" valign="middle">{{ $data->jumlah_beli }}</td>
            <td style="padding-right:5px;" width="150" height="14" align="right" valign="middle">Rp. {{ number_format($data->total_bayar, 0, ',', '.') }}</td>
        </tr>
    @endforeach
    </table>
</div>

<div id="footer-tanggal">
    Bandar Lampung, {{ date("d-m-Y") }}
</div>

<div id="footer-nama">
    Yuwanti Eka Sari
</div>
</body>
</html>

<!-- Create a route and a controller method to generate the PDF using html2pdf library -->
