@extends('templatesFutsal.layout')
@section('css')
@parent
<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{ asset('style/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
<!-- JQuery DataTable Css -->
<link href="{{ asset('style/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@section('content')
<!-- CPU Usage -->
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>FUTSAL DASHBOARD</h2>
                    </div>
                </div>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Pelajar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th align="center" colspan="2">Total Pendapatan</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 0 ?>
                                    @foreach($report as $value)
                                        <tr>
                                            <td>{{$i=$i+1}}</td>
                                            <td>{{date('d F Y', strtotime($value->tanggal))}}</td>
                                            <td>{{$value->total_income}}</td>
                                            <td><a href="" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
<!-- #END# CPU Usage -->
@endsection
@section('js')
@parent
<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('style/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('style/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('style/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('style/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('style/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('style/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('style/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('style/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('style/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

<!-- Autosize Plugin Js -->
<script src="{{ asset('style/plugins/autosize/autosize.js')}}"></script>

<!-- Moment Plugin Js -->
<script src="{{ asset('style/plugins/momentjs/moment.js')}}"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{ asset('style/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

<!-- Custom Js -->
<script src="{{ asset('style/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('style/js/pages/forms/basic-form-elements.js') }}"></script>
<script src="{{ asset('style/js/demo.js')}}"></script>
@endsection