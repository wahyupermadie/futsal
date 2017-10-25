@extends('templatesFutsal.layout')
@section('css')
    @parent
    <link href="{{ asset('style/css/sweetalert.css')}}" rel="stylesheet" />
    <link href="{{ asset('style/plugins/waitme/waitMe.css')}}" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('style/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
        <!-- Bootstrap Select Css -->
    <!--<link href="{{ asset('public/style/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />-->
@endsection
@section('content')        
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>Selamat Datang {{Auth::user()->name}}</h2>
                    </div>
                </div>
            </div>
            <div class="body">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                        <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#addField" data-toggle="tab">PROFILE</a></li>
                                <li role="presentation"><a href="#listField" data-toggle="tab">DAFTAR PEGAWAI</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="addField">
                                    <div style="background-color: #75C043; padding-top: 10px; ">
                                    @if(Session::has('success'))
                                        <div class="alert alert-info alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    <form method="POST" action="{{url('profile/'.Auth::user()->id)}}" role="form"  class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <center>
                                            <div class="form-group">
                                                <img src="{{asset('images/customer_user/'.Auth::user()->picture)}}" alt="..." class="img-rounded" class="img-responsive" style="width: 150px; height: 150px; padding-bottom: 10px;">
                                            </div>
                                            <div class="form-group">
                                                <input id="avatar"  name="avatar" type="file" class="file" data-show-upload="false" data-show-caption="true" data-allowed-file-extensions='["jpg", "jpeg", "png"]' value="" required >
                                            </div>
                                        </center>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Nama</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="name" id="name"  required="required" maxlength="50"  value=" {{Auth::user()->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Nomor Telepon (HP)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="phone" id="phone" value=" {{Auth::user()->phone}}" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Alamat Lengkap</label>
                                            <div class="col-sm-6">
                                                <input type="text" value=" {{Auth::user()->address}}" name="address" id="address" class="form-control" rows="3" maxlength="250" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2 col-sm-offset-3">
                                                <input type="hidden" name="_method" value="PUT">
                                                <button id="btnEdit" name="btnEdit" type="submit" class="btn btn-primary">Simpan Data</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="listField">
                                    <div class="table-responsive">
                                    <bottom class="btn btn-primary">TAMBAH PEGAWAI</bottom> 
                                        <table class="table table-bordered table-striped table-hover dataTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>No Telepon</th>
                                                    <th>Wajah</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1;?>
                                                @foreach($staffs as $staff)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$staff->name}}</td>
                                                    <td>{{$staff->phone}}</td>
                                                    <td><img src="{{asset('images/customer_user/'.$staff->picture)}}" class="img-rounded" class="img-responsive" style="width: 150px; height: 150px"></td>
                                                    <td><bottom class="btn btn-primary">EDIT</bottom> <bottom class="btn btn-danger">DELETE</bottom></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>

                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
            </div>
        </div>
    </div>
</div>

    @endsection
    @section('js')
        @parent
        <script src="{{ asset('style/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('style/plugins/jquery-validation/jquery.validate.js') }}"></script>
        <script src="{{ asset('style/plugins/jquery-steps/jquery.steps.js')}}"></script>
        <script src="{{ asset('style/plugins/jquery-validation/jquery.validate.js')  }}"></script>
        <script src="{{ asset('style/js/pages/forms/form-validation.js')}}"></script>
        <script src="{{ asset('style/plugins/autosize/autosize.js')}}"></script>
        <script src="{{ asset('style/plugins/momentjs/moment.js')}}"></script>
        <script src="{{ asset('style/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>


        <!-- Jquery DataTable Plugin Js -->
        <script src="{{ asset('style/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('style/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
        <script src="{{ asset('style/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('style/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>

        <!-- Custom Js -->
        <script src="{{ asset('style/js/pages/tables/jquery-datatable.js') }}"></script>
        <script src="{{ asset('style/js/pages/forms/basic-form-elements.js') }}"></script>

    <script>
        @if(Session::has('success'))
            new Noty({
                type: 'success',
                layout: 'top',
                text: '{{ Session::get('success') }}',
                timeout: 3000
            }).show();
        @endif 
    </script>
    @endsection