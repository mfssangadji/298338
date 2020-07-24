@extends('298338.layouts.app')
@section('title', 'Create Article')
@section('content')
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
	        <form role="form" method="post" action="{{ route('articles') }}">
	          @csrf
	          <div class="box-body">

	            <div class="form-group @error('title') has-error @enderror">
	              <label for="title">Judul</label>
	              <input type="text" class="form-control" value="{{ old('title') }}" id="title" name="title" placeholder="Masukan judul artikel">
	              @error('title')
	              	<span class="help-block">Judul artikel tidak boleh kosong</span>
	              @enderror
	            </div>

	            <div class="form-group">
                 	<label>Konten <small>Artikel</small></label>
                	@error('content')
                    	<span class="field-error">content is empty</span>
                 	@enderror
                 	<textarea class="textarea" name="description" 
                      style="width: 100%; height: 500px; font-size: 14px; line-height: 18px;padding: 10px;">{{old('content')}}</textarea>
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
@endsection
@section('scripts')
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
@endsection