<div class="card-header bg-danger">
    <h3 class="">Are you want to delete Album :</h3>
    <h2>{{$album->name}}</h2>
</div>

<form role="form" action="{{url(route('album.destroy',$album->id))}}"
      method="post" id="add-form">
    @csrf
    @method('DELETE')
    <div class="card-body">
        <div class="form-group">
            <input type="radio" name="Delete" id="DeleteAll" value="Delete" onclick="HideMove()" checked>
            <label>Delete Album with All Photo</label>
        </div>

        <div class="form-group">
            <input type="radio" name="Delete" id="MoveAll" value="Move" onclick="ShowMove()">
            <label>Move Album's Photo To Another Album</label>
        </div>

        <div class="form-group hidden" id="moveToAlbum">
            <label>Choice Album To Move Photo</label>
            <select class="form-control" name="Album">
                <option class="">Choice One Of Album</option>
                @forelse($albums as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                @empty
                    <option>No Data</option>
                @endforelse
            </select>
        </div>
        <!-- /.card-body -->

        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger" id="form-submit">Delete</button>
        </div>
    </div>
</form>
