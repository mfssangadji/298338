@extends('298338.layouts.app')
@section('title', 'Permintaan Data')
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
          <h3 class="box-title">Permintaan Data</h3>
        </div>
        <div class="box-body">
            <!-- <form method="post" action="{{route('permintaan-data')}}" enctype="multipart/form-data">
              @csrf 
              <div class="form-group">
                <button class="btn btn-primary btn-xs pull-left" style="float: left;">Upload</button><input type="file" required class="" style="border:none" name="file">
              </div>
            </form> -->
          <table class="table table-bordered table-striped" id="postTable">
            <thead>
            <tr>
              <th>#</th>
              <th>Pesan</th>
              <th>Pengirim</th>
              <th>Jam</th>
              <th>Tanggal</th>
              <th>action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($permintaandata as $content)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td width="500px;" style="text-align: justify;">
                          {{$content->pesan}}
                        </td>
                        <td>
                          <a href="mailto: {{$content->email}}" title="Kirim email ke {{$content->email}}" target="_blank">{{$content->nama}}</a>
                          <sup class="text-red">({{$content->no_telp}})</sup>
                        </td>
                        <td>{{$content->created_at->format('h:i A')}}</td>
                        <td>{{$content->created_at->format('d M Y')}}</td>
                        <td>
                            <form method="post" action="{{ url(config('app.root').'/permintaan-data/'.$content->id) }}" style="display:inline">
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