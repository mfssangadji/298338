
<?php $__env->startSection('title', 'Create Article'); ?>
<?php $__env->startSection('content'); ?>
	<div class="row">
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Tambah Artikel</h3>
	        </div>
	        <!-- /.box-header -->
	        <!-- form start -->
	        <form role="form" method="post" action="<?php echo e(route('articles')); ?>">
	          <?php echo csrf_field(); ?>
	          <div class="box-body">

	            <div class="form-group <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
	              <label for="title">Judul</label>
	              <input type="text" class="form-control" value="<?php echo e(old('title')); ?>" id="title" name="title" placeholder="Masukan judul artikel">
	              <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
	              	<span class="help-block">Judul artikel tidak boleh kosong</span>
	              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
	            </div>

	            <div class="form-group">
                 	<label>Konten <small>Artikel</small></label>
                	<?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    	<span class="field-error">content is empty</span>
                 	<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                 	<textarea class="textarea" name="description" 
                      style="width: 100%; height: 500px; font-size: 14px; line-height: 18px;padding: 10px;"><?php echo e(old('content')); ?></textarea>
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
    $('.textarea').summernote({
          height: 200,
          placeholder: 'type your article content here...',
          toolbar: [
		    ['style', ['style']],
		    ['font', ['bold', 'italic', 'underline', 'clear']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['height', ['height']],
		    ['table', ['table']],
		    ['insert', ['link', 'picture', 'hr']],
		    ['view', ['fullscreen', 'codeview']],
		    ['help', ['help']]
		  ],
          hint: {
            words: ['BMKG', 'bmkg.co.id'],
            match: /\b(\w{1,})$/,
            search: function (keyword, callback) {
              callback($.grep(this.words, function (item) {
                return item.indexOf(keyword) === 0;
              }));
            }
          },

          cleaner:{
                action: 'both', // both|button|paste 'button' only cleans via toolbar button, 'paste' only clean when pasting content, both does both options.
                newline: '<br>', // Summernote's default is to use '<p><br></p>'
                icon: '<b class="note-icon">Clean Format</b>',
                keepHtml: false, // Remove all Html formats
                keepOnlyTags: ['<p>', '<br>', '<ul>', '<li>', '<b>', '<strong>','<i>', '<a>'], // If keepHtml is true, remove all tags except these
                keepClasses: false, // Remove Classes
                badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'], // Remove full tags with contents
                badAttributes: ['style', 'start'], // Remove attributes from remaining tags
                limitChars: false, // 0/false|# 0/false disables option
                limitDisplay: 'both', // text|html|both
                limitStop: false // true/false
          } 
    });

  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('298338.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/298338/articles/create.blade.php ENDPATH**/ ?>