@extends('owner.layout.main')
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
            <a href="" class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center  bubble-shadow-small">
                                    <i class="far fa-envelope"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <h4 class="card-title">Feedback</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('owner.laporan.index') }}" class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center bubble-shadow-small">
                                    <i class="icon-notebook"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <h4 class="card-title">Laporan</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

        
  
        </div>
    </div><!-- /.page-content -->
@endsection
