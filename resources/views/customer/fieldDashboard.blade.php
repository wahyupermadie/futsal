@extends('templatesFutsal.layout')
@section('css')
    @parent
    <link href="{{ asset('style/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />
    <link href="{{ asset('style/plugins/waitme/waitMe.css')}}" rel="stylesheet" />
        <!-- JQuery DataTable Css -->
    <link href="{{ asset('style/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
        <!-- Bootstrap Select Css -->
    <!--<link href="{{ asset('public/style/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />-->
@endsection
    @section('content')        
    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>FORM TAMBAH LAPANGAN</h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#addField" data-toggle="tab">ADD FIELD</a></li>
                                <li role="presentation"><a href="#listField" data-toggle="tab">LIST FIELD</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="addField">
                                    <form id="form_validation" enctype="multipart/form-data" method="POST" action="{{route('field.store')}}">
                                    {{csrf_field()}}
                                        <div class="form-line">
                                        <label>Nama Lapangan</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                        </div>
                                        <!-- <div class="row"> -->
                                        <label>Jenis Lapangan</label>
                                            <select id="category_id" name="category_id" class="form-control">
                                                @foreach($jenisLapangan as $value)
                                                    {{$value->id}}
                                                    {{$value->name}}
                                                    <option value="{{$value->id}}">
                                                    <?php echo $value->name ?></option>
                                                @endforeach
                                            </select>
                                        <div class="form-group">
                                            <div class="form-line">
                                            <label>Gambar Lapangan</label>
                                                <input type="file" class="form-control" name="picture" required>          
                                            </div>
                                        </div>
                                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="listField">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Lapangan</th>
                                                    <th>Gambar Lapangan</th>
                                                    <th>Jenis Lapangan</th>
                                                    <th align="center">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Lapangan</th>
                                                    <th>Gambar Lapangan</th>
                                                    <th>Jenis Lapangan</th>
                                                    <th align="center">Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            @php(
                                                $no = 1
                                            )
                                            @foreach($lapangan as $value)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$value->name}}</td>
                                                    <td><img src="{{asset('images/'.$value->picture)}}" style="width:200px" alt=""></td>
                                                    <td>{{$value->category->name}}</td>
                                                    <td>
                                                       <a href="{{url('field/'.$value->id.'/edit')}}" class="btn btn-success">EDIT</a>
                                                    
                                                        <form method="POST">
                                                            <button type="submit" class="btn btn-danger" >DELETE</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endsection
    @section('js')
        @parent
        <script src="{{ asset('style/plugins/sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{ asset('style/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('style/plugins/jquery-validation/jquery.validate.js') }}"></script>
        <script src="{{ asset('style/plugins/jquery-steps/jquery.steps.js')}}"></script>
        <script src="{{ asset('style/plugins/jquery-validation/jquery.validate.js')  }}"></script>
        <script src="{{ asset('style/js/pages/forms/form-validation.js')}}"></script>
        <script src="{{ asset('style/plugins/autosize/autosize.js')}}"></script>
        <script src="{{ asset('style/plugins/momentjs/moment.js')}}"></script>
        <script src="{{ asset('style/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>


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