@extends('templatesFutsal.layout')
@section('css')
@parent
<link href="{{ asset('public/style/css/materialize.css') }}" rel="stylesheet">
<link href="{{ asset('public/style/css/materialize.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/style/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="row clearfix">
<div class="card">
<div class="header">
    <h2>FORM EDIT LAPANGAN</h2>
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
        <form method="POST" enctype="multipart/form-data" action='{{url("lapangan/$field->id")}}'>
            {{csrf_field()}}
            <div class="form-line">
                <label>Nama Lapangan</label>
                <input type="text" class="form-control" name="name" value="{{$field->name}}"required>
            </div>
            <div class="form-line">
            <label>Kategori Lapangan</label>
                <select id="category_id" name="category_id" class="form-control">
                    @foreach($category as $kategori)
                        <option value="{{$kategori->id}}"
                            <?php if($kategori->id == $field->category_id){
                                echo "selected=selected";
                            } ?> 
                        >
                        <?php echo $kategori->name ?>
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-line">
                <img src="{{asset('images/'.$field->picture)}}" alt="" style="width:200px; padding-top:20px; padding-bottom:5px;">
                <input type="file" class="form-control" name="picture" value="{{$field->picture}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="_method" value="PUT">
                <button style="margin-top:5px;" type="submit"class="btn btn-success">SAVE</button>
            </div>
        </form> 
    </div>   
</div>
</div> 

@endsection
@section('js')
@parent
    <script src="{{ asset('public/style/js/materialize.js') }}" >
    <script src="{{ asset('public/style/js/materialize.min.js') }}" >
@endsection