@extends('298338.layouts.app')
@section('title', 'Aerodrom Wind Shear Warning')
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
          <h3 class="box-title">Aerodrom Wind Shear Warning</h3>
        </div>
        <div class="box-body">
          @if(Request::segment(4) == "edit")
            <form method="post" action="{{route('aerodrom').'/'.$content->id}}">
              @csrf 
              @method('PATCH')
              <div class="form-group">
                <input type="text" required class="form-control" value="{{$content->content}}" name="content" placeholder="Input peringatan (tekan @enter untuk menambah)">
                <button style="margin-top: 1px;" class="btn btn-warning btn-xs" onclick="self.history.back()">Cancel</button>
              </div>
            </form>
          @else
            <form method="post" action="{{route('aerodrom')}}">
              @csrf 
              <div class="form-group">
                <input type="text" required class="form-control" name="content" placeholder="Input peringatan (tekan @enter untuk menambah)">
              </div>
            </form>
          @endif
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
                @foreach($contents as $content)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td width="600px;" style="text-align: justify;">
                          {{strip_tags($content->content)}}
                        </td>
                        <td>{{$content->created_at->format('h:i A')}}</td>
                        <td>{{$content->created_at->format('d M Y')}}</td>
                        <td>
                            <a href="{{url(config('app.root').'/aerodrom/'.$content->id.'/edit')}}" class="badge badge-success">edit</a> | 
                            <form method="post" action="{{ url(config('app.root').'/aerodrom/'.$content->id) }}" style="display:inline">
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