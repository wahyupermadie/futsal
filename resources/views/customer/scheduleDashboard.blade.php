@extends('templatesFutsal.layout')
@section('css')
@parent
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
                                JADWAL DASHBOARD
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
                            <form>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <label>Jam Mulai</label>
                                            <select id="jammulai" name="jammulai" class="form-control">
                                            <option value="" disabled selected>Choose your option</option>
                                                @for($i=6;$i<=11;$i++)
                                                    <option value="{{$i}}">{{$i}}:00</option>
                                                @endfor
                                            </select>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <label>Jam Akhir</label>
                                            <select id="jamakhir" name="jamakhir" class="form-control">
                                            <option value="" disabled selected>Choose your option</option>
                                                @for($j=19;$j<=24;$j++)
                                                    <option value="{{$j}}">{{$j}}:00</option>
                                                @endfor
                                            </select>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-line">
                                                <input type="number" id="hargapelajar" name="hargapelajar" class="form-control" placeholder="Harga Pelajar">
                                            </div>                                    
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-line">
                                                <input type="number" id="hargaumum" name="hargaumum" class="form-control" placeholder="Harga Umum">
                                            </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary btn-lg m-l-15 waves-effect">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                            <form id="schedule_form">
                            <table class="table bordered" id="table-input">
                                
                            </table>	    
                        </form>
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
    <script src="{{ asset('public/style/js/materialize.js') }}" >
    <script src="{{ asset('public/style/js/materialize.min.js') }}" >

@endsection