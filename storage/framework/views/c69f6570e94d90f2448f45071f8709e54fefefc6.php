
<?php $__env->startSection('title', 'Articles'); ?>
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
          <h3 class="box-title">Artikel</h3>
          <div style="float: right">
            <a href="<?php echo e(route('articles.add')); ?>" class="btn btn-default">
                Tambah Artikel
            </a>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped" id="postTable">
            <thead>
            <tr>
              <th>#</th>
              <th style="width: 550px;">Judul Artikel</th>
              <th>Jam</th>
              <th>Tanggal</th>
              <th>action</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($article->title); ?></td>
                        <td><?php echo e($article->created_at->format('h:i A')); ?></td>
                        <td><?php echo e($article->created_at->format('d M Y')); ?></td>
                        <td>
                            <a href="<?php echo e(url(config('app.root').'/articles/'.$article->id.'/edit')); ?>" class="badge badge-success">edit</a> | 
                            <form method="post" action="<?php echo e(url(config('app.root').'/articles/'.$article->id)); ?>" style="display:inline">
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
<?php echo $__env->make('298338.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/298338/articles/index.blade.php ENDPATH**/ ?>