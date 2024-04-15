@extends('admin.layout.main') <!-- If you have a common layout, extend it here -->

@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1 style="color:#585858">
                <i class="ace-icon fa fa-user"></i> Data Konsumen
            </h1>
        </div><!-- /.page-header -->

        @if (empty($_GET['alert']))
        @endif

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-header">
                            Data Konsumen
                        </div>
                        <!-- div.table-responsive -->

                        <!-- div.dataTables_borderWrap -->
                        <div>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama konsumen</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th class="hidden-480">Tanggal Daftar</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($konsumens as $data)
                                        @php
                                            $tgl = substr($data['tanggal_daftar'], 0, 10);
                                            $exp = explode('-', $tgl);
                                            if (count($exp) >= 3) {
                                                $tanggal_daftar = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
                                            } else {
                                                $tanggal_daftar = ''; // or some default value if needed
                                            }
                                        @endphp

                                        <tr>
                                            <td width="30" class="center">{{ $no }}</td>
                                            <td width="180">{{ $data['name'] }}</td>
                                            <td width="280">
                                                {{ $data['alamat'] }}, {{ $data['nama_kabkota'] }},
                                                {{ $data['nama_provinsi'] }},
                                                Kode Pos {{ $data['kode_pos'] }}
                                            </td>
                                            <td width="60" align="center">{{ $data['telepon'] }}</td>
                                            <td width="100">{{ $data['email'] }}</td>
                                            <td width="110" class="hidden-480 center">
                                                {{ \Carbon\Carbon::parse($data['created_at'])->format('d-m-Y') }} </td>
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
