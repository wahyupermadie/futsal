@extends('templatesFutsal.layout')
@section('css')
    <link href="{{ asset('public/style/css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('public/style/css/materialize.min.css') }}" rel="stylesheet">
@endsection
@section('content')
            <!-- Inline Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PILIH LAPANGAN
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
                            <div class="row">
                                @foreach($field as $value)
                                <div class="col-md-4 col-sm-6">
                                    <div class="panel panel-default text-center">
                                        <div class="panel-heading">
                                            <img src='{{asset("images/$value->picture")}}' alt="..." class="img-rounded" class="img-responsive" style="width: 280px; height: 180px">
                                        </div>
                                        <div class="panel-body" style="padding:0px !important;">
                                            <table style="margin:0px;"class="table">
                                                <tr align="center">
                                                    <td>
                                                        <h3>{{$value->name}}</h3>
                                                    </td>
                                                </tr>
                                            </table>
                                            <p><a class="btn btn-primary" href='{{url("/jadwal/$value->id/create")}}'>Edit Jadwal</a></p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Inline Layout -->
@endsection
@section('js')
@parent
<script type="text/javascript">
		$('#jammulai').change(function(){
			makeSchedule();
		});
		$('#jamakhir').change(function(){
			makeSchedule();
		});
		$(document).ready(function(){
			makeSchedule();
		});

		function makeSchedule(){
			var open = parseInt($("#jammulai option:selected").val());
			var close = parseInt($("#jamakhir option:selected").val());
			var input="<tr>"+
				"<td>Pukul</td>"+
				"<td>Pelajar</td>"+
				"<td>Umum</td>"+
			"</tr>";
			var  k=0;
			for (k = open; k <= close; k++) {
				input+=	"<tr>"+
							"<td>"+k+":00</td>"+
							"<td><input type='number' name='mahasiswa' placeholder='harga Pelajar'></td>"+
							"<td><input type='number' name='mahasiswa' placeholder='harga umum'></td>"+
						"</tr>";
			}
			$("#table-input").html(input);
		}
	</script>
    <script src="{{ asset('public/style/js/materialize.js') }}" />
    <script src="{{ asset('public/style/js/materialize.min.js') }}" />

@endsection