@extends('admin.layout.main')
@section('title', 'Dashboard')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <!-- PAGE CONTENT BEGINS -->
                <div style="margin-top:10px" class="alert alert-block alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <i class="ace-icon fa fa-user blue"></i>
                    Selamat datang
                    <strong class="blue">{{ Auth::user()->name }}</strong>.
                </div>
                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->

        <hr>
        <div class="row mt-md-2">

            <a href="{{ route('admin.konsumen.index') }}" class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center bubble-shadow-small">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <h4 class="card-title">Konsumen</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.barang.index') }}" class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center bubble-shadow-small">
                                    <i class="icon-folder"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <h4 class="card-title">Barang</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.biaya.index') }}" class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center bubble-shadow-small">
                                    <i class="fa fa-truck"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <h4 class="card-title">Biaya Kirim</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.pesanan') }}" class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center  bubble-shadow-small">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <h4 class="card-title">Pesanan</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.konfirm') }}" class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center  bubble-shadow-small">
                                    <i class="fa fa-retweet"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <h4 class="card-title">Pembayaran</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>



        </div>

        <div class="row">
            <div class="col-xs-5">
                <?php

          if (!is_null($transaksi) && $transaksi->jumlah > 0) { ?>
                <div class="col-12">
                    <div style="margin-top:10px" class="alert alert-block alert-info">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="ace-icon fa fa-times"></i>
                        </button>
                        <a href="{{ route('admin.pesanan') }}">
                            <i class="ace-icon fa fa-info-circle blue"></i>
                            Anda memiliki <?php echo $transaksi->jumlah; ?> pesanan baru.
                        </a>
                    </div>
                </div>
                <?php
            }



            if (!$pembayaran->isEmpty()) {
                foreach ($pembayaran as $row) {
                    $jumlah = $row->jumlah;
                    $status_bayar = $row->status_bayar;
                    ?>
                <div style="margin-top:10px" class="alert alert-block alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <a href="?module=konfirmasi">
                        <i class="ace-icon fa fa-info-circle blue"></i>
                        Anda memiliki <?php echo $jumlah; ?> konfirmasi pembayaran baru.
                    </a>
                </div>
                <?php
                }
            }

			?>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
@endsection
