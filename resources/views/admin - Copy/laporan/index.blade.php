@extends('admin.layout.main')

@section('content')
<div class="page-content">
    <div class="page-header">
        <h1 style="color:#585858">
            <i class="ace-icon fa fa-file-text-o"></i>
            Laporan
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!--PAGE CONTENT BEGINS-->
            <form class="form-horizontal" role="form" action="{{ route('admin.laporan.cetak') }}" method="GET" target="_blank">
                @csrf
                <div class="form-group">
                    <label class="col-sm-1 control-label no-padding-right">Filter</label>

                    <div class="col-sm-3">
                        <select class="chosen-select" name="bulan" data-placeholder="Bulan..." required>
                            <option value=""></option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <select class="chosen-select" name="tahun" data-placeholder="Tahun..." required>
                            <option value=""></option>
                            @foreach ($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-1 col-md-11">
                            <button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-print"></i> Cetak</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--PAGE CONTENT ENDS-->
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div><!--/.page-content-->
@endsection
