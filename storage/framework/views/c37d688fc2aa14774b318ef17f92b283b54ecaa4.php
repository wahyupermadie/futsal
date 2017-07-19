<?php $__env->startSection('css'); ?>
    ##parent-placeholder-2f84417a9e73cead4d5c99e05daff2a534b30132##
    <link href="<?php echo e(asset('public/style/plugins/sweetalert/sweetalert.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/style/plugins/waitme/waitMe.css')); ?>" rel="stylesheet" />
        <!-- JQuery DataTable Css -->
    <link href="<?php echo e(asset('public/style/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>" rel="stylesheet">
        <!-- Bootstrap Select Css -->
    <!--<link href="<?php echo e(asset('public/style/plugins/bootstrap-select/css/bootstrap-select.css')); ?>" rel="stylesheet" />-->
<?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>        
    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>FORM TAMBAH LAPANGAN</h2>
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
                                <li role="presentation" class="active"><a href="#addField" data-toggle="tab">ADD FIELD</a></li>
                                <li role="presentation"><a href="#listField" data-toggle="tab"><?php echo e(Auth::user()->id); ?></a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="addField">
                                    <form id="form_validation" enctype="multipart/form-data" method="POST" action="<?php echo e(route('lapangan.store')); ?>">
                                    <?php echo e(csrf_field()); ?>

                                        <div class="form-line">
                                        <label>Nama Lapangan</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <label>Jenis Lapangan</label>
                                            <select id="category_id" name="category_id" class="form-control">
                                                <?php $__currentLoopData = $jenisLapangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($value->id); ?>

                                                    <?php echo e($value->name); ?>

                                                    <option value="<?php echo e($value->id); ?>">
                                                    <?php echo $value->name ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
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
                                            <?php (
                                                $no = 1
                                            ); ?>
                                            <?php $__currentLoopData = $lapangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($no++); ?></td>
                                                    <td><?php echo e($value->name); ?></td>
                                                    <td><img src="<?php echo e(asset('public/images/'.$value->picture)); ?>" style="width:300px" alt=""></td>
                                                    <td><?php echo e($value->category->name); ?></td>
                                                    <td>
                                                       <a href="<?php echo e(('lapangan/'.$value->id.'/edit')); ?>" class="btn btn-success">EDIT</a>
                                                    
                                                        <form method="POST">
                                                            <button type="submit" class="btn btn-danger" >DELETE</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('js'); ?>
        ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
        <script src="<?php echo e(asset('public/style/plugins/sweetalert/sweetalert.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/jquery-validation/jquery.validate.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/jquery-steps/jquery.steps.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/jquery-validation/jquery.validate.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/js/pages/forms/form-validation.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/autosize/autosize.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/momentjs/moment.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')); ?>"></script>


        <!-- Jquery DataTable Plugin Js -->
        <script src="<?php echo e(asset('public/style/plugins/jquery-datatable/jquery.dataTables.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/jquery-datatable/extensions/export/jszip.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/jquery-datatable/extensions/export/pdfmake.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/jquery-datatable/extensions/export/vfs_fonts.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/plugins/jquery-datatable/extensions/export/buttons.print.min.js')); ?>"></script>

        <!-- Custom Js -->
        <script src="<?php echo e(asset('public/style/js/pages/tables/jquery-datatable.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/js/pages/forms/basic-form-elements.js')); ?>"></script>
        <script src="<?php echo e(asset('public/style/js/demo.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('templatesFutsal.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>