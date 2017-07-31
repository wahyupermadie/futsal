@extends('templatesFutsal.layout')
@section('css')
@parent
@endsection
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>
    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL MEMBER</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">help</i>
                </div>
                <div class="content">
                    <div class="text">PLAYING</div>
                    <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">forum</i>
                </div>
                <div class="content">
                    <div class="text">BOOKING</div>
                    <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">NEW VISITORS</div>
                    <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Widgets -->
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
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <?php $first=true; ?>
                        @foreach($field as $value)
                            <li role="presentation" @if($first) class="active" @endif><a href="#field{{$value->id}}" data-toggle="tab">{{$value->name}}</a></li>
                            <?php $first=false; ?>
                        @endforeach
                        <!-- <li role="presentation"><a href="#listField" data-toggle="tab">LIST FIELD</a></li> -->
                    </ul>

                    <div class="tab-content">
                    <?php $first=true; ?>
                    @foreach($field as $value)
                        <div role="tabpanel" class="tab-pane fade @if($first) in active @endif" id="field{{$value->id}}">
                            <table class="table">
                                <tr>
                                    <td>Jam</td>
                                    <td>Harga Pelajar</td>
                                    <td>Harga Umum</td>
                                    <td>Status</td>
                                </tr>
                                @foreach($value->schedule as $schedule)
                                    <tr>
                                        <td>{{$schedule->start_at}} - {{$schedule->finish_at}}</td>
                                        <td>{{$schedule->pelajar}}</td>
                                        <td>{{$schedule->umum}}</td>
                                        @if(is_null($schedule->transaction))
                                            <td>Kosong</td>
                                        @elseif($schedule->transaction->status === "Pending")
                                            <td><a href="" class="pending-btn btn btn-primary" data-transaksi="{{$schedule->transaction->id}}" data-user="{{$schedule->transaction->user_id}}">{{$schedule->transaction->status}}</span></a></td>
                                        @elseif($schedule->transaction->status === "Success")
                                            <td><a href="" class="success-btn btn btn-primary" data-user="{{$schedule->transaction->user_id}}">{{$schedule->transaction->status}}</span></a></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <?php $first=false; ?>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# CPU Usage -->
    <!-- Default Size -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel" align="center">Please Wait</h4>
                </div>
                <div class="modal-body">
                    loading...
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@parent
<!-- BOOKING SUCCESS-->
<script type="text/javascript">
$(".success-btn").click(function(e){
            e.preventDefault();
            var id=$(this).attr('data-user');
            var url= "{{url('customer/booking/success')}}"+"/"+id;
            $("#myModal").modal('show');
            $.get(url,
                function(html){
                    $("#myModal .modal-body").html(html);
                    $("#myModal .modal-header").attr('style','background-color: #337ab7');
                    $("#myModal .modal-header .modal-title").html('Data Pemesan');
                    $('#myModalLabel').attr('style','color:white;')
                }   
            );
                
        });
</script>
<!-- BOOKING PENDING -->
<script type="text/javascript">
$(".pending-btn").click(function(e){
            e.preventDefault();
            var id=$(this).attr('data-user');
            var id_trans=$(this).attr('data-transaksi');
            var url= "{{url('customer/booking/pending')}}"+"/"+id+"/"+id_trans;
            $("#myModal").modal('show');
            $.get(url,
                function(html){
                    $("#myModal .modal-body").html(html);
                    $("#myModal .modal-header").attr('style','background-color: #337ab7');
                    $("#myModal .modal-header .modal-title").html('Konfirmasi Booking');
                    $('#myModalLabel').attr('style','color:white;')
                }   
            );
                
        });
</script>
<script src="{{asset('style/plugins/morrisjs/morris.js')}}"></script>
<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('style/plugins/jquery-countto/jquery.countTo.js')}}"></script>
<!-- Flot Charts Plugin Js -->
<script src="{{asset('style/plugins/flot-charts/jquery.flot.js')}}"></script>
<script src="{{asset('style/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
<script src="{{asset('style/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
<script src="{{asset('style/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
<script src="{{asset('style/plugins/flot-charts/jquery.flot.time.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('style/js/admin.js')}}"></script>
<script src="{{asset('style/js/pages/index.js')}}"></script>
@endsection