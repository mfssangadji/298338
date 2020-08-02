@extends('298338.layouts.app')
@section('title', 'Pengguna Maskapai')
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
          <h3 class="box-title">Pengguna Maskapai</h3>
          <div style="float: right">
            <a href="{{route('flightdoc-users.add')}}" class="btn btn-default">
                Tambah Pengguna Maskapai
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
              <th>maskapai</th>
              <th>password</th>
              <th>action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($fdu as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$maskapai[$user->maskapai]}}</td>
                        <td>{{$user->password}}</td>
                        <td>
                            <a href="{{url(config('app.root').'/flightdoc-users/'.$user->id.'/edit')}}" class="badge badge-success">edit</a> | 
                            <form method="post" action="{{ url(config('app.root').'/flightdoc-users/'.$user->id) }}" style="display:inline">
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