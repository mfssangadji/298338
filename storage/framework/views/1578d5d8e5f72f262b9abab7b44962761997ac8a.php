
<?php $__env->startSection('title', 'Aerodrom Wind Shear Warning'); ?>
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
          <h3 class="box-title">Aerodrom Wind Shear Warning</h3>
        </div>
        <div class="box-body">
          <?php if(Request::segment(4) == "edit"): ?>
            <form method="post" action="<?php echo e(route('aerodrom').'/'.$content->id); ?>">
              <?php echo csrf_field(); ?> 
              <?php echo method_field('PATCH'); ?>
              <div class="form-group">
                <input type="text" required class="form-control" value="<?php echo e($content->content); ?>" name="content" placeholder="Input Aerodom WSW (tekan @enter  atau tombol @update  untuk merubah)">
                <button type="submit" style="margin-top: 1px;" class="btn btn-default btn-xs">Update</button>
                <button style="margin-top: 1px;" class="btn btn-warning btn-xs" onclick="self.history.back()">Cancel</button>
              </div>
            </form>
          <?php else: ?>
            <form method="post" action="<?php echo e(route('aerodrom')); ?>">
              <?php echo csrf_field(); ?> 
              <div class="form-group">
                <input type="text" required class="form-control" name="content" placeholder="Input peringatan (tekan @enter  atau tombol @insert  untuk menambah)">
                <button type="submit" style="margin-top: 1px;" class="btn btn-default btn-xs">Insert</button>
              </div>
            </form>
          <?php endif; ?>
          <table class="table table-bordered table-striped" id="postTable">
            <thead>
            <tr>
              <th>#</th>
              <th>Aerodrom Wind Shear Warning</th>
              <th>Jam</th>
              <th>Tanggal</th>
              <th>action</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td width="600px;" style="text-align: justify;">
                          <?php echo e(strip_tags($content->content)); ?>

                        </td>
                        <td><?php echo e($content->created_at->format('h:i A')); ?></td>
                        <td><?php echo e($content->created_at->format('d M Y')); ?></td>
                        <td>
                            <a href="<?php echo e(url(config('app.root').'/aerodrom/'.$content->id.'/edit')); ?>" class="badge badge-success">edit</a> | 
                            <form method="post" action="<?php echo e(url(config('app.root').'/aerodrom/'.$content->id)); ?>" style="display:inline">
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
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('298338.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/298338/awsw/index.blade.php ENDPATH**/ ?>