
<?php $__env->startSection('title', 'Flight Documents'); ?>
<?php $__env->startSection('content'); ?>
  <div class="row">

    <div class="col-xs-12">
    
      <?php if(session('status')): ?>
      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo e(session('status')); ?>

      </div>
      <?php endif; ?>

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Flight Documents</h3>
        </div>
        <div class="box-body">
            <form method="post" action="<?php echo e(route('flightdoc')); ?>" enctype="multipart/form-data">
              <?php echo csrf_field(); ?> 
              <div class="form-group">
                <label for="maskapai">Maskapai</label>
                <select class="form-control select2" data-placeholder="Select" required name="maskapai" multiple="multiple"
                        style="width: 100%;">
                    <?php $__currentLoopData = $maskapai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <button class="btn btn-primary btn-xs pull-left" style="float: left; margin-top: 1px">Upload</button><input type="file" required class="" style="border:none" name="file">
              </div>
            </form>
          <table class="table table-bordered table-striped" id="postTable">
            <thead>
            <tr>
              <th>#</th>
              <th>Maskapai</th>
              <th>Flight Documents</th>
              <th>Jam</th>
              <th>Tanggal</th>
              <th>action</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $flightdoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($maskapai[$content->maskapai]); ?></td>
                        <td width="600px;" style="text-align: justify;">
                          <a href="../docs/<?php echo e($content->file); ?>" target="_blank"><i class="fa fa-search"></i></a> <?php echo e($content->file); ?>

                        </td>
                        <td><?php echo e($content->created_at->format('h:i A')); ?></td>
                        <td><?php echo e($content->created_at->format('d M Y')); ?></td>
                        <td>
                            <form method="post" action="<?php echo e(url(config('app.root').'/flightdoc/'.$content->id)); ?>" style="display:inline">
                              <?php echo method_field('DELETE'); ?>
                              <?php echo csrf_field(); ?>
                            <button type="submit" class="badge badge-danger" style="border: none;">delete</button>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
  $(document).ready(function() {
      $('#postTable').DataTable( {
          "order": [[ 0, "desc" ]]
      });

      $('.select2').select2({
        theme: "classic",
        maximumSelectionLength: 1,
      })
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('298338.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/298338/flightdoc/index.blade.php ENDPATH**/ ?>