@extends('admin.layout.main')

@section('content')
<div class="page-content">
    <div class="page-header">
        <h1 style="color:#585858">
            <i class="ace-icon fa fa-edit"></i>
            Input Kategori Barang
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!--PAGE CONTENT BEGINS-->
            <form class="form-horizontal" role="form" action="{{ route('admin.kategori.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right">Nama Kategori</label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-12 col-sm-5" name="nama_kategori" autocomplete="off" required />
                    </div>
                </div>
                
                <div class="clearfix form-actions">
                    <div class="col-md-offset-2 col-md-10">
                        <input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
                        &nbsp; &nbsp; 
                        <a style="width:100px" href="{{ route('admin.kategori.index') }}" class="btn">Batal</a>
                    </div>
                </div>
            </form>
            <!--PAGE CONTENT ENDS-->
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div><!--/.page-content-->
@endsection
