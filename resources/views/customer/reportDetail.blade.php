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
            </div>
            <div class="body">
                <!-- Exportable Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                            <div class="row clearfix">
                                <form action="{{url('report/show')}}" method="GET">
                                 {{csrf_field()}} 
                                    <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input  value="@if(isset($firstdate)){{$firstdate}}@endif" name="firstDate" id="firstDate" type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input  value="@if(isset($seconddate)){{$seconddate}}@endif" name="secondDate" id="secondDate" type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">                                        
                                        <button type="submit" class="btn btn-primary">FIND</button>                                       
                                    </div>
                                </div>
                            </form>
                        </div> 
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <?php $first=true; ?>
                            @foreach($detail as $value)
                                <li role="presentation" @if($first) class="active" @endif><a href="#field{{$value->id}}" data-toggle="tab">{{$value->name}}</a></li>
                            <?php $first=false; ?>
                            @endforeach
                            <!-- <li role="presentation"><a href="#listField" data-toggle="tab">LIST FIELD</a></li> -->
                        </ul>
                        <div class="tab-content">
                            <?php $first=true; ?>
                            @foreach($detail as $value)
                            <div role="tabpanel" class="tab-pane fade @if($first) in active @endif" id="field{{$value->id}}">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jam Mulai</th>
                                                <th>Jam Akhir</th>
                                                <th>Status</th>
                                                <th>Pendapatan</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <?php $i = 1; $total=0;?>
                                            @foreach($value->schedule as $schedule)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$schedule->start_at}}</td>
                                                <td>{{$schedule->finish_at}}</td>
                                                <td>
                                                    @if(isset($schedule->transaction) && $schedule->transaction->status=='Success')
                                                        Sukses
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td> 
                                                    @if(is_null($schedule->transaction))
                                                        Rp. 0
                                                    @else
                                                        Rp {{number_format($schedule->transaction->price)}}
                                                        <?php $total+=$schedule->transaction->price;?>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                         <tfoot>
                                            <tr>
                                                <th align="center" colspan="4">Total Pendapatan</th>
                                                <th>
                                                    Rp {{number_format($total)}}
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <?php $first=false; ?>
                            @endforeach
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