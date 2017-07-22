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
                                Edit Jadwal
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
                                <li class="active"><a href="#senin" data-toggle="tab">SENIN</a></li>
                                <li><a href="#selasa" data-toggle="tab">SELASA</a></li>
                                <li><a href="#rabu" data-toggle="tab">RABU</a></li>
                                <li><a href="#kamis" data-toggle="tab">KAMIS</a></li>
                                <li><a href="#jumat" data-toggle="tab">JUMAT</a></li>
                                <li><a href="#sabtu" data-toggle="tab">SABTU</a></li>
                                <li><a href="#minggu" data-toggle="tab">MINGGU</a></li>
                            </ul>
                            <div class="row">
                                <form method="POST" id="schedule_form" action='{{url("jadwal/{$field_id}/$day/store")}}'>
                                {{csrf_field()}}
                                    <table class="table bordered" id="table-input">
                                        <thead>
                                            <tr>
                                                <td>Jam</td>
                                                <td>Harga Pelajar</td>
                                                <td>Harga Umum</td>
                                            </tr>
                                        </thead>
                                        <tbody id="section">
                                            <tr>
                                                <td>     
                                                    <select name="start[]" class="form-control start">
                                                        @for($i=6;$i<=24;$i++)
                                                            <option value="{{$i}}">{{$i}}:00</option>
                                                        @endfor
                                                    </select>

                                                    <select name="finish[]" class="form-control finish" >
                                                        @for($i=11;$i<=24;$i++)
                                                            <option value="{{$i}}">{{$i}}:00</option>
                                                        @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="pelajar[]" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="umum[]" required>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-primary" id="add-btn">Tambah</button>
                                    <button type="submit" class="btn">Save</button>
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
<script type="text/javascript">
    $(document).ready(function(){
        // alert(tempForm);
        $("#add-btn").click(function(){
            var finish = parseInt($(".finish option:selected").last().val());
            createForm(finish);
        });

        function createForm(finish){
            var option ="";
            for (var i = finish+1; i<24; i++) {
                option+="<option value='"+i+"'>"+i+":00</option>";
            }
            var form ="<tr>"+
                        "<td>"+
                            "<select name='start[]' class='form-control start'>"+
                                "<option value="+finish+">"+finish+":00</option>"+
                            "</select>"+

                            "<select name='finish[]' class='form-control finish' >"+
                                option+
                            "</select>"+
                        "</td>"+
                        "<td>"+
                                "<input type='text' class='form-control' name='pelajar[]' required>"+
                        "</td>"+
                        "<td>"+
                                "<input type='text' class='form-control' name='umum[]' required>"+
                        "</td>"+
                    "</tr>";
            $("#section").append(form);
        }
    });
</script>
@endsection