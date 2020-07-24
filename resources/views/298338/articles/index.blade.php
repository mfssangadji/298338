@extends('298338.layouts.app')
@section('title', 'Articles')
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
          <h3 class="box-title">Artikel</h3>
          <div style="float: right">
            <a href="{{route('articles.add')}}" class="btn btn-default">
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
                @foreach($articles as $article)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->created_at->format('h:i A')}}</td>
                        <td>{{$article->created_at->format('d M Y')}}</td>
                        <td>
                            <a href="{{url(config('app.root').'/articles/'.$article->id.'/edit')}}" class="badge badge-success">edit</a> | 
                            <form method="post" action="{{ url(config('app.root').'/articles/'.$article->id) }}" style="display:inline">
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
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
          $('#postTable').DataTable( {
              "order": [[ 0, "desc" ]]
          });
      });
</script>
@endsection