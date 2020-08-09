
<?php $__env->startSection('title', 'Prakiraan dan Analisis Hujan Bulanan'); ?>
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
          <h3 class="box-title">Prakiraan dan Analisis Hujan Bulanan</h3>
        </div>
        <div class="box-body">
            <form method="post" action="<?php echo e(route('pahb')); ?>" enctype="multipart/form-data">
              <?php echo csrf_field(); ?> 
              <div class="form-group">
                <button class="btn btn-primary btn-xs pull-left" style="float: left;">Upload</button><input type="file" required class="" style="border:none" name="file">
              </div>
            </form>
          <table class="table table-bordered table-striped" id="postTable">
            <thead>
            <tr>
              <th>#</th>
              <th>Prakiraan dan Analisis Hujan Bulanan</th>
              <th>Jam</th>
              <th>Tanggal</th>
              <th>action</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pahb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td width="600px;" style="text-align: justify;">
                          <a href="../docs/<?php echo e($content->file); ?>" target="_blank"><i class="fa fa-search"></i></a> <?php echo e($content->file); ?>

                        </td>
                        <td><?php echo e($content->created_at->format('h:i A')); ?></td>
                        <td><?php echo e($content->created_at->format('d M Y')); ?></td>
                        <td>
                            <form method="post" action="<?php echo e(url(config('app.root').'/pahb/'.$content->id)); ?>" style="display:inline">
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
<?php echo $__env->make('298338.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/298338/pahb/index.blade.php ENDPATH**/ ?>