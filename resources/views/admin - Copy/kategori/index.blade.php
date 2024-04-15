@extends('admin.layout.main')
@section('content')
<div class="page-content">
    <div class="page-header">
        <h1 style="color:#585858">
            <i style="margin-right:7px" class="ace-icon fa fa-folder-o"></i> Kategori Barang
            <a href="{{ route('admin.kategori.create') }}">
                <button class="btn btn-primary pull-right">
                    <i class="ace-icon fa fa-plus"></i> Tambah
                </button>
            </a>
        </h1>
    </div><!-- /.page-header -->

    @if(empty(request('alert')))
    @elseif(request('alert') == 1)
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>
            <strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
            kategori barang berhasil disimpan.
            <br>
        </div>
    @elseif(request('alert') == 2)
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>
            <strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
            kategori barang berhasil diubah.
            <br>
        </div>
    @elseif(request('alert') == 3)
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>
            <strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
            kategori barang berhasil dihapus.
            <br>
        </div>
    @endif

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-header">
                        Data Kategori Barang
                    </div>
                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kategori Barang</th>
                                    <th><i class="ace-icon fa fa-bookmark"></i></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($kategoris as $data)
                                @php
                                $jumlah = $data->barang()->count();
                                @endphp
                                <tr>
                                    <td width="50" class="center">{{ $no }}</td>
                                    <td width="250">{{ $data->nama_kategori }}</td>
                                    <td width="80" class="center">{{ $jumlah }}</td>
                                    <td width="80" class="center">
                                        <div class="action-buttons">
                                            <a data-rel="tooltip" data-placement="top" title="Ubah" style="margin-right:5px"
                                                class="blue tooltip-info"
                                                href="{{ route('admin.kategori.edit', $data->id) }}">
                                                <i class="ace-icon fa fa-edit bigger-130"></i>
                                            </a>

                                            <a data-rel="tooltip" data-placement="top" title="Hapus" class="red tooltip-error" href="{{ route('admin.kategori.destroy', $data->id) }}" onclick="event.preventDefault(); if (confirm('Anda yakin ingin menghapus kategori barang {{ $data->nama_kategori }} ?')) document.getElementById('delete-form-{{ $data->id }}').submit();">
                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                            </a>
                                        
                                            <form id="delete-form-{{ $data->id }}" action="{{ route('admin.kategori.destroy', $data->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                $no++;
                                @endphp
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