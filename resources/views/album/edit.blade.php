<form role="form" action="{{url(route('album.update',$album->id))}}"
      method="post" id="add-form">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1 "> Name</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                   id="exampleInputEmail1" placeholder="name" name="name" value="{{$album->name}}">
        </div>
        @error('name')
        <span class="alert alert-danger small-box" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <!-- /.card-body -->

    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="form-submit">Update</button>
    </div>
</form>
