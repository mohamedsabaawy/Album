<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Album') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <button class="btn btn-primary" data-toggle="modal" data-target="#new_album" >Add Album</button>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>No Of Photos</th>
                            <th>Photo Action</th>
                            <th>Album Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($albums as $album)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$album->name}}</td>
                                <td class="text-center"><span class=""> {{(count($album->Photos))}}</span></td>
                                <td>
                                    <div class="">
                                        <a class="btn btn-primary" onclick="photoAdd({{$album->id}})" data-toggle="modal" data-target="#add_photo"><i class="fa fa-plus"></i></a>
                                        <a href="{{route('album.show',$album->id)}}" class="btn btn-info"><i class="fa fa-photo-video"></i></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="float-right">
                                        <a class="btn btn-warning"><i class="fa fa-edit" data-toggle="modal" data-target="#album_edit" onclick="EditAlbum({{$album->id}})"></i></a>
                                        <a class="btn btn-danger"><i class="fa fa-trash" data-toggle="modal" data-target="#album_edit" onclick="DeleteAlbum({{$album->id}})"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <h1>no data</h1>
                        @endforelse
                    </tbody>
                </table>

                {{$albums->links()}}
            </div>
        </div>
    </div>

    {{--    modal for create new Album   --}}
    <div class="modal fade" id="new_album">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Add New Album</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="result">

                    <form role="form" action="{{url(route('album.store'))}}"
                          method="post" id="add-form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1 "> Name</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                       id="exampleInputEmail1" placeholder="name" name="name" value="{{old('name')}}">
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
                            <button type="submit" class="btn btn-primary" id="form-submit">Add</button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{--    modal for add new photo to album  --}}
    <div class="modal fade" id="add_photo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Add Photo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="result">

                    <form role="form" action="{{url(route('photo.store'))}}"
                          method="post" id="photo-form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1 "> Name</label>
                                <input type="text" class="form-control  @error('displayName') is-invalid @enderror"
                                       id="exampleInputEmail1" placeholder="displayName" name="displayName" value="{{old('displayName')}}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="album_id" accept="" id="album_id">
                                <label for="exampleInputEmail1 "> File</label>
                                <input type="file" class="form-control  @error('name') is-invalid @enderror"
                                       id="exampleInputEmail1" placeholder="name" name="name" value="{{old('name')}}">
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
                            <button type="submit" class="btn btn-primary" id="form-submit">Add</button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{--    modal for Edit Album  --}}
    <div class="modal fade" id="album_edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="EditAlbumTitle">Edit Album</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="album_edit_form">


                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</x-app-layout>

