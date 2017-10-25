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
                            <!-- @if((Auth::user()->privillege_id)==1) -->
                            <div class="row clearfix">
                                <form action="{{url('report/show')}}" method="GET">
                                {{--  {{csrf_field()}}  --}}
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
                            <!-- @endif -->
                            <div class="row clearfix">
                                <!-- <div class="col-lg-6 "> -->
                                    <div class="card">
                                        <div class="body">
                                                <canvas id="myChart"></canvas>
                                        </div>
                                    </div>    
                                <!-- </div> -->
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
                                    <tbody>
                                    <?php $i = 0; $total=0;?>
                                    @foreach($report as $value)
                                        <tr>
                                            <td>{{$i=$i+1}}</td>
                                            <td>{{date('d F Y', strtotime($value->tanggal))}}</td>
                                            <td>Rp {{number_format($value->total_income)}}
                                            <?php $total+=$value->total_income;?></td>
                                            <td><a href='{{url("report/detail/".$value->tanggal)}}' class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th align="center" colspan="2">Total Pendapatan</th>
                                            <th>Rp {{ number_format($total, 2) }}</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
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
43
<!                                  -- Autosize Plugin Js -->
<script src="{{ asset('style/plugins/autosize/autosize.js')}}"></script>

<!-- Chart Plugins Js -->
<script src="{{ asset('style/plugins/chartjs/Chart.bundle.js')}}"></script>

<!-- Custom Js -->
<!-- <script src="../../js/admin.js"></script> -->
<script src="{{ asset('style/js/chartJs/Chart.bundle.js')}}"></script>
<script src="{{ asset('style/js/chartJs/Chart.bundle.min.js')}}"></script>
<script src="{{ asset('style/js/chartJs/Chart.js')}}"></script>
<script src="{{ asset('style/js/chartJs/Chart.min.js')}}"></script>

<!-- Moment Plugin Js -->
<script src="{{ asset('style/plugins/momentjs/moment.js')}}"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{ asset('style/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

<!-- Custom Js -->
<script src="{{ asset('style/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('style/js/pages/forms/basic-form-elements.js') }}"></script>
<script src="{{ asset('style/js/demo.js')}}"></script>
<script>
// $(document).ready(function(){
    $.ajax({
        // url: "http://127.0.0.1:8000/report/dashboard/chart",
        // method: "GET",
        success: function(response) {
            var data_json = {!! json_encode($chart) !!};
            var data = $.parseJSON(data_json);
            console.log(data);
            var tanggal = [];
            var income = [];
            for(var i in data) {
                tanggal.push(data[i].tanggal);
                income.push(data[i].total_income);
            }
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: tanggal,
                    datasets: [{
                        label: 'Income By Date',
                        data: income,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });

         },
         error: function(){
            alert("GAGAL");
         }
    });
// });

</script>
@endsection