<?php $__env->startSection('css'); ?>
##parent-placeholder-2f84417a9e73cead4d5c99e05daff2a534b30132##

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                                <li <?php if($day=="senin"): ?> class="active" <?php endif; ?>><a href='<?php echo e(url("schedule/$field_id/senin")); ?>' >SENIN</a></li>
                                <li <?php if($day=="selasa"): ?> class="active" <?php endif; ?>><a href='<?php echo e(url("schedule/$field_id/selasa")); ?>' >SELASA</a></li>
                                <li <?php if($day=="rabu"): ?> class="active" <?php endif; ?>><a href='<?php echo e(url("schedule/$field_id/rabu")); ?>' >RABU</a></li>
                                <li <?php if($day=="kamis"): ?> class="active" <?php endif; ?>><a href='<?php echo e(url("schedule/$field_id/kamis")); ?>' >KAMIS</a></li>
                                <li <?php if($day=="jumat"): ?> class="active" <?php endif; ?>><a href='<?php echo e(url("schedule/$field_id/jumat")); ?>' >JUMAT</a></li>
                                <li <?php if($day=="sabtu"): ?> class="active" <?php endif; ?>><a href='<?php echo e(url("schedule/$field_id/sabtu")); ?>' >SABTU</a></li>
                                <li <?php if($day=="minggu"): ?> class="active" <?php endif; ?>><a href='<?php echo e(url("schedule/$field_id/minggu")); ?>'>MINGGU</a></li>
                            </ul>
                            <div class="row">
                                <table class="table bordered" id="table-input">
                                    <thead>
                                        <tr>
                                            <td>Jam</td>
                                            <td>Harga Pelajar</td>
                                            <td>Harga Umum</td>
                                            <td>Action<td>
                                        </tr>
                                    </thead>
                                    <tbody id="section">
                                        <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>     
                                                <?php echo e($schedule->start_at); ?> - <?php echo e($schedule->finish_at); ?>

                                            </td>
                                            <td>
                                                <?php echo e($schedule->pelajar); ?>

                                            </td>
                                            <td>
                                                <?php echo e($schedule->umum); ?>

                                            </td>
                                            <td>
                                                <a href="" class="btn btn-success">Edit</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <a href='<?php echo e(url("schedule/$field_id/$day/create")); ?>' class="btn btn-primary">Edit Jadwal</a>
                                <form action='<?php echo e(url("schedule/$field_id/$day/copy")); ?>' method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="from" value="1">
                                    <button type="submit">Copy From Senin</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Inline Layout -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templatesFutsal.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>