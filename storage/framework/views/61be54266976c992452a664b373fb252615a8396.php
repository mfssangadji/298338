
<?php $__env->startSection('title', 'Pengguna Maskapai'); ?>
<?php $__env->startSection('content'); ?>
	<div class="row">
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Pengguna Maskapai</h3>
	        </div>
	        <!-- /.box-header -->
	        <!-- form start -->
	        <form role="form" method="post" action="<?php echo e(route('flightdoc-users')); ?>">
	          <?php echo csrf_field(); ?>
	          <div class="box-body">

	            <div class="form-group <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
	              <label for="name">Nama</label>
	              <input type="text" class="form-control" value="<?php echo e(old('name')); ?>" id="name" name="name" placeholder="Masukan nama">
	              <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
	              	<span class="help-block">Nama tidak boleh kosong</span>
	              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
	            </div>

	            <div class="form-group <?php $__errorArgs = ['maskapai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
	              <label for="maskapai">Maskapai</label>
	              <select class="form-control select2" name="maskapai" multiple="multiple"
                        style="width: 100%;">
                  	<?php $__currentLoopData = $maskapai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  		<?php if(old('maskapai') == $key): ?>
                  			<option value="<?php echo e($key); ?>" selected><?php echo e($val); ?></option>
                  		<?php else: ?>
                  			<option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                  		<?php endif; ?>
                  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
	              <?php $__errorArgs = ['maskapai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
	              	<span class="help-block">Maskapai tidak boleh kosong</span>
	              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
	            </div>

	            <div class="form-group <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
	              <label for="email">Email</label>
	              <input type="email" class="form-control" value="<?php echo e(old('email')); ?>" id="email" name="email" placeholder="Masukan email">
	              <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
	              	<span class="help-block">Email tidak boleh kosong</span>
	              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
	            </div>

	            <div class="form-group <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
	              <label for="password">Password</label>
	              <input type="text" value="<?php echo e($pass); ?>" class="form-control" id="password" name="password" placeholder="Masukan password">
	              <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
	              	<span class="help-block">Password tidak boleh kosong</span>
	              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
	            </div>
	            
	          </div>
	          <!-- /.box-body -->
	          <div class="box-footer">
	            <button type="submit" class="btn btn-primary">Tambah</button>
	            <a href="#" onclick="self.history.back()" type="button" class="btn btn-default">Batal</a>
	          </div>
	        </form>
	  	  </div>
	  	</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  $(function () {
    $('.select2').select2({
    	theme: "classic",
    	maximumSelectionLength: 1,
    })
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('298338.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/298338/flightdocusers/create.blade.php ENDPATH**/ ?>