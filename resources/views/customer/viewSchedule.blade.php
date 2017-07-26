@extends('templatesFutsal.layout')
@section('css')
@parent

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
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li @if($day=="senin") class="active" @endif><a href='{{url("jadwal/$field_id/senin")}}' >SENIN</a></li>
                                <li @if($day=="selasa") class="active" @endif><a href='{{url("jadwal/$field_id/selasa")}}' >SELASA</a></li>
                                <li @if($day=="rabu") class="active" @endif><a href='{{url("jadwal/$field_id/rabu")}}' >RABU</a></li>
                                <li @if($day=="kamis") class="active" @endif><a href='{{url("jadwal/$field_id/kamis")}}' >KAMIS</a></li>
                                <li @if($day=="jumat") class="active" @endif><a href='{{url("jadwal/$field_id/jumat")}}' >JUMAT</a></li>
                                <li @if($day=="sabtu") class="active" @endif><a href='{{url("jadwal/$field_id/sabtu")}}' >SABTU</a></li>
                                <li @if($day=="minggu") class="active" @endif><a href='{{url("jadwal/$field_id/minggu")}}'>MINGGU</a></li>
                            </ul>
                            <div class="row">
                                <table class="table bordered" id="table-input">
                                    <thead>
                                        <tr>
                                            <td>Jam</td>
                                            <td>Harga Pelajar</td>
                                            <td>Harga Umum</td>
                                        </tr>
                                    </thead>
                                    <tbody id="section">
                                        @foreach($schedules as $schedule)
                                        <tr>
                                            <td>     
                                                {{$schedule->start_at}} - {{$schedule->finish_at}}
                                            </td>
                                            <td>
                                                {{$schedule->pelajar}}
                                            </td>
                                            <td>
                                                {{$schedule->umum}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a href='{{url("jadwal/$field_id/$day/create")}}' class="btn btn-primary">Edit Jadwal</a>
                                <form action='{{url("jadwal/$field_id/$day/copy")}}' method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="from" value="1">
                                    <button type="submit">Copy From Senin</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Inline Layout -->
@endsection
@section('js')
@parent

@endsection