<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::with('photos')->paginate(5);
        return view('album.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {
        $album = Auth::user()->Albums()->create([
            'name'=>$request->name,
        ]);
        return redirect()->back()->with('msg',"album ' $album->name ' has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album =Album::with('Photos')->find($id);
        return view('album.show',compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('album.edit',compact('album'))->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlbumRequest  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $album->update([
            'name' => $request->name,
        ]);

        return redirect()->route('album.index')->with('msg',"album ' $album->name ' has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album ,Request $request)
    {

        if ($request->Delete == 'Move'){

            $albumToMove =Album::with('Photos')->find($request->Album);//find the album to move photos

            $photos = Photo::where('album_id',$album->id)->get();  //get all of photos to update

            if(count($album->Photos) > 0){

                foreach ($photos as $photo) {
                    //move photos from old album to new album
                    Storage::disk('public')->move($album->name .'/'.$photo->name , $albumToMove->name.'/'.$photo->name);
                    //update photo album owner
                    $photo->update([
                       'album_id'=> $albumToMove->id,
                    ]);

                }
            }

            $album->delete();

            //delete album directory
            Storage::disk('public')->deleteDirectory($album->name);
            return redirect()->route('album.index')->with('msg',"album ' $album->name ' has been Deleted");
        }

        if (count($album->Photos) > 0){
            Storage::disk('public')->deleteDirectory($album->name);
        }
        $album->delete();
        $album->Photos()->delete();
        return redirect()->route('album.index')->with('msg',"album ' $album->name ' has been Deleted");
    }

    public function delete($id)
    {
        $album = Album::with('Photos')->find($id);
        $albums = Album::all();
        return view('album.delete',compact(['album','albums']))->render();
    }

}
