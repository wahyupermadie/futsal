<html>
    <head>
    <link href="<?php echo e(asset('style/plugins/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">
    </head>
    <body>
        <table class="table table-bordered">
                <tr align="center">
                    <td colspan="2"><img src="<?php echo e(asset('images/users/'.$user->picture)); ?>" alt="" style="width:200px;"></td>
				</tr>
				<tr align="center">
					<td colspan="2"><?php echo e($user->name); ?></td>
				</tr>
                <tr align="center">
                    <td colspan="2"><?php echo e($user->phone); ?></td>
				</tr>
                <tr align="center">
                    <td colspan="2"><?php echo e($user->email); ?></td>
				</tr>
                <tr align="center">
                <td>
                    <form action='<?php echo e(url("customer/transaction/$transaksi/pelajar")); ?>' method="POST" id="pelajar">
                        <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn btn-primary">PELAJAR</button>
                    </form>
                </td>
                <td>
                    <form action='<?php echo e(url("customer/transaction/$transaksi/umum")); ?>' method="POST" id="umum">
                        <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn btn-success">UMUM</button>
                    </form>
                </td>
				</tr>
		</table>
    </body>
<!-- Jquery Core Js -->
<script src="<?php echo e(asset('style/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap Core Js -->
<script src="<?php echo e(asset('style/plugins/bootstrap/js/bootstrap.js')); ?>"></script>
</html>