<?php $__env->startSection('css'); ?>
##parent-placeholder-2f84417a9e73cead4d5c99e05daff2a534b30132##
<link href="<?php echo e(asset('public/style/css/materialize.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('public/style/css/materialize.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('public/style/plugins/bootstrap-select/css/bootstrap-select.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
        <form method="POST" enctype="multipart/form-data" action="<?php echo e(url("lapangan/$field->id")); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="form-line">
                <label>Nama Lapangan</label>
                <input type="text" class="form-control" name="name" value="<?php echo e($field->name); ?>"required>
            </div>
            <div class="form-line">
            <label>Kategori Lapangan</label>
                <select id="category_id" name="category_id" class="form-control">
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($kategori->id); ?>"
                            <?php if($kategori->id == $field->category_id){
                                echo "selected=selected";
                            } ?> 
                        >
                        <?php echo $kategori->name ?>
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-line">
                <img src="<?php echo e(asset('public/images/'.$field->picture)); ?>" alt="" style="width:200px; padding-top:20px; padding-bottom:5px;">
                <input type="file" class="form-control" name="picture" required>
            </div>
            <div class="form-group">
                <input type="hidden" name="_method" value="PUT">
                <button style="margin-top:5px;" type="submit"class="btn btn-success">SAVE</button>
            </div>
        </form> 
    </div>   
</div>
</div> 

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
    <script src="<?php echo e(asset('public/style/js/materialize.js')); ?>" >
    <script src="<?php echo e(asset('public/style/js/materialize.min.js')); ?>" >
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templatesFutsal.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>