@extends('298338.layouts.app')
@section('title', 'Pengguna Maskapai')
@section('content')
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
	        <form role="form" method="post" action="{{ route('flightdoc-users') }}">
	          @csrf
	          <div class="box-body">

	            <div class="form-group @error('name') has-error @enderror">
	              <label for="name">Nama</label>
	              <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" placeholder="Masukan nama">
	              @error('name')
	              	<span class="help-block">Nama tidak boleh kosong</span>
	              @enderror
	            </div>

	            <div class="form-group @error('maskapai') has-error @enderror">
	              <label for="maskapai">Maskapai</label>
	              <select class="form-control select2" name="maskapai" multiple="multiple"
                        style="width: 100%;">
                  	@foreach($maskapai as $key => $val)
                  		@if(old('maskapai') == $key)
                  			<option value="{{$key}}" selected>{{$val}}</option>
                  		@else
                  			<option value="{{$key}}">{{$val}}</option>
                  		@endif
                  	@endforeach
                  </select>
	              @error('maskapai')
	              	<span class="help-block">Maskapai tidak boleh kosong</span>
	              @enderror
	            </div>

	            <div class="form-group @error('email') has-error @enderror">
	              <label for="email">Email</label>
	              <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="Masukan email">
	              @error('email')
	              	<span class="help-block">Email tidak boleh kosong</span>
	              @enderror
	            </div>

	            <div class="form-group @error('password') has-error @enderror">
	              <label for="password">Password</label>
	              <input type="text" value="{{$pass}}" class="form-control" id="password" name="password" placeholder="Masukan password">
	              @error('password')
	              	<span class="help-block">Password tidak boleh kosong</span>
	              @enderror
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
    $('.select2').select2({
    	theme: "classic",
    	maximumSelectionLength: 1,
    })
  })
</script>
@endsection