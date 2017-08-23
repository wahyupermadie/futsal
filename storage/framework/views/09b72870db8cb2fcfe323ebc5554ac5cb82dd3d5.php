<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('public/style/css/materialize.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/style/css/materialize.min.css')); ?>" rel="stylesheet">
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
                            <div class="row">
                                <?php $__currentLoopData = $field; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- <div class="card" style="width: 20rem;">
                                    <img class="card-img-top" style="width:318px;height:180px;" src='<?php echo e(asset("images/$value->picture")); ?>' alt="Card image cap">
                                    <div class="card-block">
                                        <h4 class="card-title"><?php echo e($value->name); ?></h4>
                                        <p><a class="btn btn-primary" href='<?php echo e(url("/jadwal/$value->id/create")); ?>'>Edit Jadwal</a></p>
                                    </div>
                                </div> -->
                                <div class="col-md-4 col-sm-6">
                                    <div class="panel panel-default text-center">
                                        <div class="panel-heading">
                                            <img src='<?php echo e(asset("images/$value->picture")); ?>' alt="..." class="img-rounded" class="img-responsive" style="width: 280px; height: 180px">
                                        </div>
                                        <div class="panel-body" style="padding:0px !important;">
                                            <table style="margin:0px;"class="table">
                                                <tr align="center">
                                                    <td>
                                                        <h3><?php echo e($value->name); ?></h3>
                                                    </td>
                                                </tr>
                                            </table>
                                            <p><a class="btn btn-primary" href='<?php echo e(url("/jadwal/$value->id/create")); ?>'>Edit Jadwal</a></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Inline Layout -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
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
    <script src="<?php echo e(asset('public/style/js/materialize.js')); ?>" />
    <script src="<?php echo e(asset('public/style/js/materialize.min.js')); ?>" />

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templatesFutsal.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>