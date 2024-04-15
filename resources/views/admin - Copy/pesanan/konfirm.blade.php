@extends('admin.layout.main') {{-- Assuming you have a base layout called 'app.blade.php' --}}

@section('content')
<div class="page-content">
    <div class="page-header">
        <h1 style="color:#585858">
            <i style="margin-right:7px" class="ace-icon fa fa-retweet"></i> Data Konfirmasi Pembayaran
        </h1>
    </div><!-- /.page-header -->

    @if (empty(request('alert')))
    @elseif (request('alert') == 1)
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-check-circle"></i> Pembayaran diterima</strong>
        <br>
    </div>
    @elseif (request('alert') == 2)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-times-circle"></i> Pembayaran ditolak</strong>
        <br>
    </div>
    @endif

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-header">
                        Data Konfirmasi Pembayaran
                    </div>

                    <div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Konsumen</th>
                                    <th>Jumlah</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($transactions as $data)
                                <tr>
                                    <td width="40" class="center">{{ $no++ }}</td>
                                    <td width="100" class="center">{{ \Carbon\Carbon::parse($data->tanggal_transaksi)->format('d-m-Y') }}</td>
                                    <td width="150">{{ $data->transaksi->konsumen->user->name }}</td>
                                    <td width="70" class="center">{{ $data->jumlah }} barang</td>
                                    <td width="100" align="right">Rp. {{ number_format($data->transaksi->total_bayar, 0, ',', '.') }}</td>
                                    <td width="150">{{ $data->transaksi->status }}</td>
                                    <td width="60" class="center">
                                        <div class="action-buttons">
                                            <a data-rel="tooltip" data-placement="top" title="Detail" class="blue tooltip-info" href="">
                                                <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
@endsection
