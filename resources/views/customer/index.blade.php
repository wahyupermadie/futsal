@extends('templatesFutsal.layout')
@section('css')
@parent
@endsection
@section('content')
<div class="container">
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
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person_add</i>
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
                    <i class="material-icons">person</i>
                </div>
                <div class="content">
                    <div class="text">CANCEL BOOKING</div>
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
                            <h2>FUTSAL DASHBOARD {{$date}}</h2>
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
                    <form action="#" method="GET">

                        <?php
                            $dateNow=date("Y-m-d");
                            $startDate= new DateTime($dateNow);;
                            $endDate=  new DateTime(date("Y-m-d",strtotime($dateNow." + 7 days")));
                            $daterange= new DatePeriod($startDate,new DateInterval('P1D'),$endDate);

                        ?>
                        <select name="date" id="dateInput">
                            @foreach($daterange as $dt)
                                <?php
                                    switch ($dt->format('N')) {
                                        case '1':
                                            $hari="Senin";
                                            break;
                                        
                                        case '2':
                                            $hari="Selasa";
                                            break;
                                        
                                        case '3':
                                            $hari="Rabu";
                                            break;
                                        
                                        case '4':
                                            $hari="Kamis";
                                            break;
                                        
                                        case '5':
                                            $hari="Jumat";
                                            break;
                                        
                                        case '6':
                                            $hari="Sabtu";
                                            break;
                                        
                                        case '7':
                                            $hari="Minggu";
                                            break;
                                    }
                                ?>
                                <option value="{{$dt->format('Y-m-d')}}" @if($date==$dt->format('Y-m-d')) selected="selected" @endif>
                                    {{$hari}}, {{$dt->format('d M Y')}}
                                </option>
                            @endforeach
                        </select>
                    </form>
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
                                    <td>Action</td>
                                </tr>
                                @foreach($value->schedule as $schedule)
                                    <tr>
                                        <td>{{$schedule->start_at}} - {{$schedule->finish_at}}</td>
                                        <td>{{$schedule->pelajar}}</td>
                                        <td>{{$schedule->umum}}</td>
                                        @if(is_null($schedule->transaction)||$schedule->transaction->status === "cancel")
                                            <td>Kosong</td>
                                        @elseif($schedule->transaction->status === "pending")
                                            <td>Menunggu Konfirmasi</td>
                                        @elseif($schedule->transaction->status === "accepted")
                                            <td>Menunggu Pembayaran</td>
                                        @else
                                            <td>Sukses</td>
                                        @endif

                                        <td> 
                                        @if(is_null($schedule->transaction)||$schedule->transaction->status === "cancel")
                                            <a href="#" class="book-btn btn btn-primary" data-schedule="{{$schedule->id}}"><span>Booking</span></a>
                                        @elseif($schedule->transaction->status === "pending")
                                            <a href="" class="pending-btn btn btn-warning" data-transaksi="{{$schedule->transaction->id}}" data-user="{{$schedule->transaction->user_id}}">Konfirmasi</span></a>
                                        @elseif($schedule->transaction->status === "accepted")
                                            @if(is_null($schedule->transaction->user_id))
                                                <a href="" class="success-btn btn btn-success" data-transaksi="{{$schedule->transaction->id}}" data-user="{{$schedule->transaction->user_id}}">Offline</span></a>
                                            @else                 
                                                <a href="" class="success-btn btn btn-success" data-transaksi="{{$schedule->transaction->id}}" data-user="{{$schedule->transaction->user_id}}">Online</span></a>
                                            @endif
                                        @else
                                            <a href="#" class="btn btn-success"><span>Sukses</span></a>
                                        @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <?php $first=false; ?>
                    @endforeach
                    </div><!-- tab-content -->
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

<!-- NEW BOOKING -->
<script type="text/javascript">
$(".book-btn").click(function(e){
    $("#myModal .modal-body").html("loading...");
    e.preventDefault();
    var played_at="{{$date}}";
    var schedule_id=$(this).attr('data-schedule');
    var url= "{{url('transaction/create')}}?played_at="+played_at+"&schedule_id="+schedule_id;
    $("#myModal").modal('show');
    $.get(url,function(html){
        $("#myModal .modal-body").html(html);
        $("#myModal .modal-header").attr('style','background-color: #337ab7');
        $("#myModal .modal-header .modal-title").html('Data Pemesan');
        $('#myModalLabel').attr('style','color:white;')
    });
                
});
</script>

<!-- BOOKING SUCCESS-->
<script type="text/javascript">
$(".success-btn").click(function(e){
    $("#myModal .modal-body").html("loading...");
    e.preventDefault();
    var id_trans=$(this).attr('data-transaksi');
    var url= "{{url('transaction/success')}}"+"/"+id_trans;
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
        $("#myModal .modal-body").html("loading...");
        e.preventDefault();
        var id_trans=$(this).attr('data-transaksi');
        var url= "{{url('transaction/pending')}}"+"/"+id_trans;
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

    $('#dateInput').change(function(e){
        var date=$("#dateInput option:selected").val();
        var URL="{{url('/')}}";
        if($("#dateInput option:selected").index()==0){
            window.location.replace(URL);
        }else{
            window.location.replace(URL+"?date="+date);
        }
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