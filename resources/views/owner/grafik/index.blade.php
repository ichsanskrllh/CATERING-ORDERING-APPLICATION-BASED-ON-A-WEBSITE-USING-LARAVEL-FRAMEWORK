@extends('owner.layout.main')

@section('content')
<div class="page-content">
    <div class="page-header">
        <h1 style="color:#585858">
            <i class="ace-icon fa fa-bar-chart"></i>
            Grafik
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!--PAGE CONTENT BEGINS-->
            <form class="form-horizontal" role="form" action="{{ route('admin.grafik.show') }}" method="get">
                {{-- @csrf --}}
                <div class="form-group">
                    <label class="col-sm-1 control-label no-padding-right">Tahun</label>

                    <div class="col-sm-2">
                        <select class="chosen-select" id="tahun" name="tahun" data-placeholder="Pilih Tahun..." required>
                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                            @foreach ($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="clearfix form-actions">
                    <div class="col-md-offset-1 col-md-11">
                        <input style="width:100px" type="submit" class="btn btn-primary" name="tampil" value="Tampilkan" />
                    </div>
                </div>
            </form>

            @if(isset($tahun))
                <div style="margin-bottom:20px" class="col-xs-12">
                    <div class="widget-box">
                        <div class="widget-body">
                            <div class="widget-main">
                                <div id="grafik" style="max-width:95%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- PAGE CONTENT ENDS -->
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div><!--/.page-content-->

@if(isset($tahun))
<script src="{{ asset('admin/assets/plugins/highcharts/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/highcharts/highcharts.js') }}"></script>
<script>
    $(document).ready(function () {
        var tahun = {{ $tahun }};
        var data = {!! json_encode($data) !!};
        // console.log(data);

        chart1 = new Highcharts.Chart({
        chart: {
            renderTo: 'grafik',
            type: 'column'
        },   
        title: {
            text: 'Grafik Jumlah Penjualan Barang <br> Tahun <?php echo $tahun; ?>'
        },
        xAxis: {
            categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']
        },
        yAxis: {
            title: {
               text: 'Jumlah Penjualan'
            }
        },
        tooltip: { 
            //fungsi tooltip, ini opsional, kegunaan dari fungsi ini 
            //akan menampikan data di titik tertentu di grafik saat mouseover
            formatter: function() {
                    return '<b>Bulan: '+ this.x +'</b><br/>'+'Jumlah Penjualan: '+ this.y +' Barang';
            }
        },
            series:             
            [{
                name: 'Barang',
                data: data
            }
            ]
      });
    });
</script>
@endif

@endsection
