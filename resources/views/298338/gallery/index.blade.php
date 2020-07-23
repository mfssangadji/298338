@extends('298338.layouts.app')
@section('title', 'Gallery')
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
          <h3 class="box-title">Gallery ({{$album->name}})</h3>
          <div style="float: right">
            <a href="{{route('album')}}" type="button" class="btn btn-default">
                Daftar Album
            </a>
          </div>
        </div>
        <div class="box-body">
           <form method="post" action="{{url(config('app.root').'/album/'.$album->id.'/gallery')}}" enctype="multipart/form-data">
              @csrf 
              <div class="form-group">
                <button class="btn btn-primary btn-xs pull-left" style="float: left;">Upload</button><input type="file" required style="border:none" name="file">
                <input type="hidden" name="album_id" value="{{$album->id}}">
                <input type="text" name="description" class="form-control" placeholder="Masukan deskripsi gambar (tekan @enter atau tombol @upload untuk menambah)" required>
              </div>
            </form>
          <table class="table table-bordered table-striped" id="postTable" hidden>
            <thead>
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Description</th>
              <th>action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($album->gallery as $g)
                    <tr class="item{{$g->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td style="width: 50px;">
                            <a href="../../../docs/{{$g->file}}" target="_blank"><i class="fa fa-search"></i></a>
                        </td>
                        <td style="width: 700px; text-align: justify;">
                          {{strip_tags($g->description)}}
                        </td>
                        <td>
                            <form method="post" action="{{ url(config('app.root').'/album/'.$g->album_id.'/gallery/'.$g->id) }}" style="display:inline">
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
    <script type="text/javascript">
      $(window).ready(function () {
          $('#postTable').removeAttr("hidden");
      });
  </script>
  <script type="text/javascript">
      $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Tambah Informasi');
            $('#addModal').modal('show');
        });

        $('.modal-footer').on('click', '.add', function() {
            var album_id = $('#album_id').val();
            var file = $('#file').prop('files')[0];
            var content = tinyMCE.activeEditor.getContent();
            var data = new FormData();
            data.append('file', file);
            data.append('album_id', album_id);
            data.append('content', content);
            data.append('_token', $('meta[name=_token]').val());
            $.ajax({
                type: 'POST',
                url: 'gallery',
                cache       : false,
                contentType : false,
                processData : false,
                data: data,
                success: function(data) {
                  $('#addModal')
                    .find("textarea,select")
                       .val('')
                       .end()
                    .find("input[type=checkbox], input[type=radio]")
                       .prop("checked", "")
                       .end();

                    toastr.success('Successfully, added new post!', 'Success!', {timeOut: 5000, positionClass: "toast-bottom-right", progressBar: true});
                    $('#postTable').append("<tr class='item"+data.id+"'><td>"+data.id+"</td><td><button class='btn btn-info btn-xs btn-flat view-modal' data-id='"+data.id+"' data-file='"+data.file+"' style='border: none;'>Lihat</button></td>><td>"+data.description+"</td><td><button class='btn btn-danger btn-xs btn-flat delete-modal' data-id='"+data.id+"' data-content='"+data.content+"' data-created_at='"+data.created_at+"' style='border: none;'>delete</button></td></tr>");
                },
            });
        });

        $(document).on('click', '.edit-modal', function(){
            $('#editModal')
            .find("input,textarea,select")
               .val('')
               .end()
            .find("input[type=checkbox], input[type=radio]")
               .prop("checked", "")
               .end();
            $('.modal-title').text('Ubah Informasi');
            $('#id_update').val($(this).data('id'));
            tinyMCE.get("description_update").setContent($(this).data('content'));
            $('#editModal').modal('show');
            id = $('#id_update').val();
        });
        $('.modal-footer').on('click', '.update', function(){
            $.ajax({
                type: 'PUT',
                url: 'gallery/' + id,
                data: {
                    '_token': $('meta[name=_token]').val(),
                    'content': tinyMCE.activeEditor.getContent(),
                },
                success: function(data){
                    toastr.success('Successfully, updated post!', 'Success!', {timeOut: 5000, positionClass: "toast-bottom-right", progressBar: true});
                    $('.item' + id).replaceWith("<tr class='item"+data.id+"'><td>"+data.id+"</td><td><button class='btn btn-info btn-xs btn-flat view-modal' data-id='"+data.id+"' data-file='"+data.file+"' style='border: none;'>Lihat</button></td><td>"+data.created_at+"</td><td><button class='btn btn-primary btn-xs btn-flat edit-modal' data-id='"+data.id+"' data-content='"+data.content+"' data-created_at='"+data.created_at+"' style='border: none;'>edit</button> | <button class='btn btn-danger btn-xs btn-flat delete-modal' data-id='"+data.id+"' data-content='"+data.content+"' data-created_at='"+data.created_at+"' style='border: none;'>delete</button></td></tr>");
                }
            });
        });

        $(document).on('click', '.delete-modal', function(){
            $('.modal-title').text('Hapus Informasi');
            $('#id_delete').val($(this).data('id'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function(){
            $.ajax({
                type: 'DELETE',
                url: 'gallery/' + id,
                data: {
                    '_token': $('meta[name=_token]').val(),
                },
                success: function(data){
                    toastr.success('Successfully, post deleted!', 'Success!', {timeOut: 5000, positionClass: "toast-bottom-right", progressBar: true});
                    $('.item' + id).remove();
                }
            });
        });

        $(document).on('click', '.view-modal', function () {
            $('#viewModal')
                    .find(".modal-view")
                       .html('')
                       .end();
            $('.modal-title').text('Lihat Gambar');
            $("#viewModal").modal('show');
            $.ajax({
                type: 'POST',
                url: 'gallery/view',
                data: {
                    '_token': $('meta[name=_token]').val(),
                    'file': $(this).attr('data-file'),
                },
                success: function(html) {
                    $(".modal-view").html(html);
                }
            });
        });

        $(document).ready(function() {
            $('#postTable').DataTable( {
                "order": [[ 0, "desc" ]]
            });
        });
  </script>
@endsection