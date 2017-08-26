@extends('templatesFutsal.layout')
@section('css')
@parent
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
                        <div class="header">
                            <h2>
                                EXPORTABLE TABLE
                            </h2>
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
                            <div class="dropdown" style="padding-bottom:5px;">
                                <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Tutorials
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" value="1" href="#">Januari</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" value="2" href="#">Februari</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" value="3" href="#">Maret</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" value="4" href="#">April</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" value="5" href="#">Mei</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" value="6" href="#">Juni</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" value="7" href="#">Juli</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" value="8" href="#">Agustus</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" value="9" href="#">September</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" value="10" href="#">Oktober</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" value="11" href="#">November</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" value="12" href="#">Desember</a></li>
                                </ul>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Pelajar</th>
                                            <th>Umum</th>
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
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                        </tr>
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

<!-- Custom Js -->
<script src="{{ asset('style/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('style/js/pages/forms/basic-form-elements.js') }}"></script>
<script src="{{ asset('style/js/demo.js')}}"></script>
@endsection