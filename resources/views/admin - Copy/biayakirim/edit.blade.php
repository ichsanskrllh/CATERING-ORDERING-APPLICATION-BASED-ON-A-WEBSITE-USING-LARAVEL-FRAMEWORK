@extends('admin.layout.main') {{-- Assuming you have a layout file, adjust the layout path as needed --}}

@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1 style="color:#585858">
                <i class="ace-icon fa fa-edit"></i>
                Ubah Biaya Pengiriman
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!--PAGE CONTENT BEGINS-->
                <form class="form-horizontal" role="form" action="{{ route('admin.biaya.update',$data->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Provinsi</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="provinsi" id="provinsiDropdown" placeholder="Pilih Provinsi"
                                required>
                                <option value="{{ $data->provinsi }}">{{ $data->provinsis->nama_provinsi }}</option>
                                    @foreach ($provinsiList as $province)
                                <option value="{{ $province->id }}">{{ $province->nama_provinsi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kabupaten/Kota</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="kabkota" id="kabkotaDropdown"
                                placeholder="Pilih Kabupaten/Kota"  required>
                                <option value="{{ $data->kabkota }}">{{ $data->kabKota->nama_kabkota }}</option>
                                @foreach ($kabkotaList as $kabkota)
                                    <option value="{{ $kabkota->id }}">{{ $kabkota->nama_kabkota }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Biaya</label>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="text" class="form-control" name="biaya" autocomplete="off"
                                    onKeyPress="return goodchars(event,'0123456789',this)" value="{{ $data->biaya }}"
                                    required />
                            </div>
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-2 col-md-10">
                            <input style="width:100px" type="submit" class="btn btn-primary" name="simpan"
                                value="Simpan" />
                            &nbsp; &nbsp;
                            <a style="width:100px" href="{{ url('?module=biaya_kirim') }}" class="btn">Batal</a>
                        </div>
                    </div>
                </form>
                <!--PAGE CONTENT ENDS-->
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->


    <!-- Add this before your script section -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        // JavaScript to handle the dynamic update of kabupaten/kota dropdown
        $(document).ready(function() {
            $('#provinsiDropdown').on('change', function() {
                var provinsiId = $(this).val();
                if (provinsiId) {
                    $('#kabkotaDropdown').prop('disabled', false); // Enable the kabkota dropdown
                    $.ajax({
                        url: '{{ route('getKabkotaByProvinsi') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            provinsi_id: provinsiId
                        },
                        success: function(data) {
                            $('#kabkotaDropdown').empty();
                            $.each(data, function(key, value) {
                                $('#kabkotaDropdown').append('<option value="' + value
                                    .id + '">' + value.nama_kabkota +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('#kabkotaDropdown').prop('disabled', true); // Disable the kabkota dropdown
                    $('#kabkotaDropdown').empty(); // Clear the options when provinsi is not selected
                }
            });
        });
    </script>
@endsection
