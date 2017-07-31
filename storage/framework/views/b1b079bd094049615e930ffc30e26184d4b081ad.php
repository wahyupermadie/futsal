<?php $__env->startSection('css'); ?>
##parent-placeholder-2f84417a9e73cead4d5c99e05daff2a534b30132##
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>
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
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">help</i>
                </div>
                <div class="content">
                    <div class="text">PLAYING</div>
                    <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">forum</i>
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
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">NEW VISITORS</div>
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
                            <h2>FUTSAL DASHBOARD</h2>
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
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <?php $first=true; ?>
                        <?php $__currentLoopData = $field; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li role="presentation" <?php if($first): ?> class="active" <?php endif; ?>><a href="#field<?php echo e($value->id); ?>" data-toggle="tab"><?php echo e($value->name); ?></a></li>
                            <?php $first=false; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- <li role="presentation"><a href="#listField" data-toggle="tab">LIST FIELD</a></li> -->
                    </ul>

                    <div class="tab-content">
                    <?php $first=true; ?>
                    <?php $__currentLoopData = $field; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div role="tabpanel" class="tab-pane fade <?php if($first): ?> in active <?php endif; ?>" id="field<?php echo e($value->id); ?>">
                            <table class="table">
                                <tr>
                                    <td>Jam</td>
                                    <td>Harga Pelajar</td>
                                    <td>Harga Umum</td>
                                    <td>Status</td>
                                </tr>
                                <?php $__currentLoopData = $value->schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($schedule->start_at); ?> - <?php echo e($schedule->finish_at); ?></td>
                                        <td><?php echo e($schedule->pelajar); ?></td>
                                        <td><?php echo e($schedule->umum); ?></td>
                                        <?php if(is_null($schedule->transaction)): ?>
                                            <td>Kosong</td>
                                        <?php elseif($schedule->transaction->status === "Pending"): ?>
                                            <td><a href="" class="pending-btn btn btn-primary" data-transaksi="<?php echo e($schedule->transaction->id); ?>" data-user="<?php echo e($schedule->transaction->user_id); ?>"><?php echo e($schedule->transaction->status); ?></span></a></td>
                                        <?php elseif($schedule->transaction->status === "Success"): ?>
                                            <td><a href="" class="success-btn btn btn-primary" data-user="<?php echo e($schedule->transaction->user_id); ?>"><?php echo e($schedule->transaction->status); ?></span></a></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        <?php $first=false; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
<!-- BOOKING SUCCESS-->
<script type="text/javascript">
$(".success-btn").click(function(e){
            e.preventDefault();
            var id=$(this).attr('data-user');
            var url= "<?php echo e(url('customer/booking/success')); ?>"+"/"+id;
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
            e.preventDefault();
            var id=$(this).attr('data-user');
            var id_trans=$(this).attr('data-transaksi');
            var url= "<?php echo e(url('customer/booking/pending')); ?>"+"/"+id+"/"+id_trans;
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
</script>
<script src="<?php echo e(asset('style/plugins/morrisjs/morris.js')); ?>"></script>
<!-- Jquery CountTo Plugin Js -->
<script src="<?php echo e(asset('style/plugins/jquery-countto/jquery.countTo.js')); ?>"></script>
<!-- Flot Charts Plugin Js -->
<script src="<?php echo e(asset('style/plugins/flot-charts/jquery.flot.js')); ?>"></script>
<script src="<?php echo e(asset('style/plugins/flot-charts/jquery.flot.resize.js')); ?>"></script>
<script src="<?php echo e(asset('style/plugins/flot-charts/jquery.flot.pie.js')); ?>"></script>
<script src="<?php echo e(asset('style/plugins/flot-charts/jquery.flot.categories.js')); ?>"></script>
<script src="<?php echo e(asset('style/plugins/flot-charts/jquery.flot.time.js')); ?>"></script>

<!-- Custom Js -->
<script src="<?php echo e(asset('style/js/admin.js')); ?>"></script>
<script src="<?php echo e(asset('style/js/pages/index.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templatesFutsal.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>