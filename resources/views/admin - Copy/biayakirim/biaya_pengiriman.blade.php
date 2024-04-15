@extends('admin.layout.main') {{-- Assuming you have a base layout named 'app.blade.php' --}}

@section('content')

    <div class="page-content">
        <div class="page-header">
            <h1 style="color:#585858">
                <i style="margin-right:7px" class="ace-icon fa fa-truck"></i> Biaya Pengiriman
                <a href="{{ route('admin.biaya.create') }}">
                    <button class="btn btn-primary pull-right">
                        <i class="ace-icon fa fa-plus"></i> Tambah
                    </button>
                </a>
            </h1>
        </div><!-- /.page-header -->

        @php
            $alerts = [
                1 => ['message' => 'biaya pengiriman berhasil disimpan.', 'icon' => 'fa fa-check-circle'],
                2 => ['message' => 'biaya pengiriman berhasil diubah.', 'icon' => 'fa fa-check-circle'],
                3 => ['message' => 'biaya pengiriman berhasil dihapus.', 'icon' => 'fa fa-check-circle'],
            ];
            $alert = isset($_GET['alert']) ? $_GET['alert'] : null;
        @endphp

        @if ($alert && isset($alerts[$alert]))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <strong><i class="{{ $alerts[$alert]['icon'] }}"></i> Sukses! </strong><br>
                {{ $alerts[$alert]['message'] }}
                <br>
            </div>
        @endif

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-header">
                            Data Biaya Pengiriman
                        </div>
                        <!-- div.table-responsive -->

                        <!-- div.dataTables_borderWrap -->
                        <div>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Provinsi</th>
                                        <th>Kabupaten/Kota</th>
                                        <th>Biaya Pengiriman</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($biayaKirim as $data)
                                        <tr>
                                            <td width="50" class="center">{{ $no }}</td>
                                            <td width="200">{{ $data['nama_provinsi'] }}</td>
                                            <td width="200">{{ $data['nama_kabkota'] }}</td>
                                            <td width="100" align="right">{{ 'Rp ' . number_format($data['biaya'], 0, ',', '.') }}</td>

                                            <td width="80" class="center">
                                                <div class="action-buttons">
                                                    <a data-rel="tooltip" data-placement="top" title="Ubah" style="margin-right:5px" class="blue tooltip-info" href="{{ route( 'admin.biaya.edit',$data['biaya_id']) }}">
                                                        <i class="ace-icon fa fa-edit bigger-130"></i>
                                                    </a>

                                                    <a data-rel="tooltip" data-placement="top" title="Hapus" class="red tooltip-error" href="{{ route('admin.biaya.destroy', $data->biaya_id) }}" onclick="event.preventDefault(); if (confirm('Anda yakin ingin menghapus kategori barang {{ $data->nama_kategori }} ?')) document.getElementById('delete-form-{{ $data->id }}').submit();">
                                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                    </a>
                                                
                                                    <form id="delete-form-{{ $data->id }}" action="{{ route('admin.biaya.destroy', $data->biaya_id) }}" method="POST" style="display: none;">
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
