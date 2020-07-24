@extends('298338.layouts.app')
@section('title', 'Pengguna')
@section('content')
  <div class="row">

    <div class="col-xs-12">
    
      @if(session('status'))
      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('status') }}
      </div>
      @endif

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Pengguna</h3>
          <div style="float: right">
            <a href="{{route('users.add')}}" class="btn btn-default">
                Tambah Pengguna
            </a>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped" id="postTable">
            <thead>
            <tr>
              <th>#</th>
              <th>nama</th>
              <th>email</th>
              <th>group</th>
              <th>action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>@if($user->status == 1) Administrator @else Operator @endif</td>
                        <td>
                            <a href="{{url(config('app.root').'/users/'.$user->id.'/edit')}}" class="badge badge-success">edit</a> | 
                            <form method="post" action="{{ url(config('app.root').'/users/'.$user->id) }}" style="display:inline">
                              @method('DELETE')
                              @csrf
                            <button type="submit" class="badge badge-danger" style="border: none;">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')

@endsection