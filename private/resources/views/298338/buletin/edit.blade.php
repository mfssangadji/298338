@extends('298338.layouts.app')
@section('title', 'Pengguna')
@section('content')
	<div class="row">
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Pengguna</h3>
	        </div>
	        <!-- /.box-header -->
	        <!-- form start -->
	        <form role="form" method="post" action="{{ url(config('app.root').'/users/'.$user->id) }}">
	          @csrf
	          @method('PATCH')
	          <div class="box-body">

	            <div class="form-group @error('name') has-error @enderror">
	              <label for="name">Nama</label>
	              <input type="text" class="form-control" value="{{ $user->name }}" id="name" name="name" placeholder="Masukan nama">
	              @error('name')
	              	<span class="help-block">Nama tidak boleh kosong</span>
	              @enderror
	            </div>

	            <div class="form-group @error('email') has-error @enderror">
	              <label for="email">Email</label>
	              <input type="email" class="form-control" value="{{ $user->email }}" id="email" name="email" placeholder="Masukan email">
	              @error('email')
	              	<span class="help-block">Email tidak boleh kosong</span>
	              @enderror
	            </div>

	            <div class="form-group @error('password') has-error @enderror">
	              <label for="password">Password <span style="font-weight: normal;">*) kosongkan jika tidak diganti</span></label>
	              <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password">
	            </div>

	            <div class="form-group @error('status') has-error @enderror">
	              <label for="status">Status</label>
	              <select class="form-control" name="status">
	              	<option value="" selected="" disabled="">Pilih status</option>
	              	<?php
	              		$arr = array(1=>"Administrator", 2=>"Operator");
	              	?>
	              	@foreach($arr as $key => $val)
	              		@if($user->status == $key)
	              			<option value="{{$key}}" selected>{{$val}}</option>
	              		@else
	              			<option value="{{$key}}">{{$val}}</option>
	              		@endif
	              	@endforeach
	              </select>
	              @error('status')
	              	<span class="help-block">Status tidak boleh kosong</span>
	              @enderror
	            </div>

	          </div>
	          <!-- /.box-body -->
	          <div class="box-footer">
	            <button type="submit" class="btn btn-primary">Ubah</button>
	            <a href="#" onclick="self.history.back()" type="button" class="btn btn-default">Batal</a>
	          </div>
	        </form>
	  	  </div>
	  	</div>
	</div>
@endsection
@section('script')

@endsection