<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('admin/assets/img/icon.ico') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('admin/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('admin/assets/css/fonts.min.css') }}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/atlantis.css') }}">
    <style>
        @page {
            size: A4 portrait;
            margin: 2cm;
        }
    </style>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}">
</head>

<body>


    <div class="col-12 text-center">
        <div class="row align-items-center justify-content-center">
            <div class="col-12">
                <div class="text-center">
                    <img src="{{ asset('assets/img/logo.png') }}" height="60">
                    <h1> TOKO ONESHOP BANDAR LAMPUNG
                        <p>Alamat: Jalan Kapten Abdul Haq, Jalur 2 Damri</p>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    

    <hr><br>

    <div id="title">
        LAPORAN JUMLAH PENJUALAN BARANG
    </div>

    <div id="title-tanggal">
        @php
            if (isset($_GET['bulan'])) {
                if ($_GET['bulan'] == '1') {
                    $bulan = 'Januari';
                } elseif ($_GET['bulan'] == '2') {
                    $bulan = 'Februari';
                } elseif ($_GET['bulan'] == '3') {
                    $bulan = 'Maret';
                } elseif ($_GET['bulan'] == '4') {
                    $bulan = 'April';
                } elseif ($_GET['bulan'] == '5') {
                    $bulan = 'Mei';
                } elseif ($_GET['bulan'] == '6') {
                    $bulan = 'Juni';
                } elseif ($_GET['bulan'] == '7') {
                    $bulan = 'Juli';
                } elseif ($_GET['bulan'] == '8') {
                    $bulan = 'Agustus';
                } elseif ($_GET['bulan'] == '9') {
                    $bulan = 'September';
                } elseif ($_GET['bulan'] == '10') {
                    $bulan = 'Oktober';
                } elseif ($_GET['bulan'] == '11') {
                    $bulan = 'November';
                } elseif ($_GET['bulan'] == '12') {
                    $bulan = 'Desember';
                }
            
                $tahun = $_GET['tahun'];
            } else {
                $bulan = '';
                $tahun = '';
            }
        @endphp
        Bulan {{ $bulan }} {{ $tahun }}
    </div>

    <br>

    <div id="isi">
        <table class="table table-bordered">
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
                    <td style="padding-left:5px;" width="210" height="14" valign="middle">
                        {{ $data->nama_barang }}
                    </td>
                    <td style="padding-right:5px;" width="150" height="14" align="right" valign="middle">Rp.
                        {{ number_format($data->harga, 0, ',', '.') }}</td>
                    <td width="120" height="14" align="center" valign="middle">{{ $data->jumlah_beli }}</td>
                    <td style="padding-right:5px;" width="150" height="14" align="right" valign="middle">Rp.
                        {{ number_format($data->total_bayar, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div id="footer-tanggal">
        Bandar Lampung, {{ date('d-m-Y') }}
    </div>

    <div id="footer-nama">
        Yuwanti Eka Sari
    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('admin/assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>

  

    <script src="{{ asset('admin/assets/plugins/ckeditor/ckeditor.js') }}"></script>

    <script>
      window.print();
    </script>
</body>

</html>

<!-- Create a route and a controller method to generate the PDF using html2pdf library -->
