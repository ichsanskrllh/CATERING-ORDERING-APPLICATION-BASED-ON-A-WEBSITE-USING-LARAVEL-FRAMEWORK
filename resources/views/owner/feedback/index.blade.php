@extends('owner.layout.main') <!-- If you have a common layout, extend it here -->

@section('title', 'Feedback')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Subjek</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                            {{-- <th><i class="ace-icon fa fa-bookmark"></i></th> --}}
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($feedback as $data)
                        <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{ $data->nama }}</td>
                           <td>{{ $data->email }}</td>
                           <td>{{ $data->subjek }}</td>
                           <td>{{ $data->pesan }}</td>
                           <td>{{ date('Y-m-d', strtotime($data->created_at)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({});
        });
    </script>
@endsection
