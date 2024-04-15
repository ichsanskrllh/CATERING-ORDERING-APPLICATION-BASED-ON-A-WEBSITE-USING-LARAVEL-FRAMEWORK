@extends('admin.layout.main')

@section('content')
<div class="page-content">
    <div class="page-header">
        <h1 style="color:#585858">
            <i class="ace-icon fa fa-folder-o"></i> Data Barang
            <a href="{{ route('admin.barang.create') }}">
                <button class="btn btn-primary pull-right">
                    <i class="ace-icon fa fa-plus"></i> Tambah
                </button>
            </a>
        </h1>
    </div><!-- /.page-header -->

    @if (!empty(request('alert')))
        @if (request('alert') == 1)
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
                data barang baru berhasil disimpan.
                <br>
            </div>
        @elseif (request('alert') == 2)
            <div class="alert alert-success">
                <!-- Rest of the alert messages -->
            </div>
        @elseif (request('alert') == 3)
            <div class="alert alert-success">
                <!-- Rest of the alert messages -->
            </div>
        @elseif (request('alert') == 4)
            <div class="alert alert-danger">
                <!-- Rest of the alert messages -->
            </div>
        @elseif (request('alert') == 5)
            <div class="alert alert-danger">
                <!-- Rest of the alert messages -->
            </div>
        @elseif (request('alert') == 6)
            <div class="alert alert-danger">
                <!-- Rest of the alert messages -->
            </div>
        @endif
    @endif

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-header">
                        Data Barang
                    </div>
                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th class="hidden-480">Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th class="hidden-480">Tanggal Masuk</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($barangList as $barang)
                                    <tr>
                                        <td width="30" class="center">{{ $loop->iteration }}</td>
                                        <td width="70" class="hidden-480 center">
                                            <img style="padding: 1px" class="profile-picture" src="{{ Storage::url($barang->gambar) }}
                                            " width="120">
                                        </td>
                                        <td width="200">
                                            <a href="">
                                                {{ $barang->nama_barang }}
                                            </a>
                                        </td>
                                        <td width="80" align="right">{{ 'Rp ' . number_format($barang['harga'], 0, ',', '.') }}</td>
                                        <td width="80" align="right">{{ $barang->stok }}</td>
                                        <td width="100" class="hidden-480 center">{{ $barang->tanggal_masuk }}</td>

                                        <td width="60" class="center">
                                            <div class="action-buttons">
                                                <a data-rel="tooltip" data-placement="top" title="Ubah" style="margin-right: 5px" class="blue tooltip-info" href="{{ route('admin.barang.edit', $barang->id) }}">
                                                    <i class="ace-icon fa fa-edit bigger-130"></i>
                                                </a>

                                                <a data-rel="tooltip" data-placement="top" title="Hapus" class="red tooltip-error" href="{{ route('admin.barang.destroy', $barang->id) }}" onclick="event.preventDefault(); if (confirm('Anda yakin ingin menghapus barang {{ $barang->nama_barang }} ?')) document.getElementById('delete-form-{{ $barang->id }}').submit();">
                                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                </a>

                                                <form id="delete-form-{{ $barang->id }}" action="{{ route('admin.barang.destroy', $barang->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
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