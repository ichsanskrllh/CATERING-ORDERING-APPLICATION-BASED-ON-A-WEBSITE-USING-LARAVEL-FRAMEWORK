@extends('owner.layout.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 style="color:#585858">
                <i class="ace-icon fa fa-file-text-o"></i>
                Laporan
            </h1>
        </div><!-- /.page-header -->

        <div class="card-body">
            <div class="col-12">
                <!--PAGE CONTENT BEGINS-->
                <form class="form-horizontal" role="form" action="{{ route('owner.laporan.cetak') }}" method="GET"
                    target="_blank">
                    @csrf
                    <div class="row">
                        <div class="col-6">         
                            <div class="form-group form-group-default">
                                <label>Filter</label>
                                <select class="chosen-select form-control" name="bulan" data-placeholder="Bulan..." required>
                                    <option value=""></option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group form-group-default">
                                <label>Tahun</label>
                                <select class="chosen-select form-control" name="tahun" data-placeholder="Tahun..." required>
                                    <option value=""></option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group form-group-default">
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-1 col-md-11">
                                <button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-print"></i>
                                    Cetak</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!--PAGE CONTENT ENDS-->
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->
@endsection
