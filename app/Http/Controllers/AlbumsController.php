<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;


class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums', $albums);
    }

    public function create(){
        return view('albums.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'image:max:2999',
        ]);

        $fullFilename = $request->file('cover_image')->getClientOriginalName();
        $filename = pathinfo($fullFilename, PATHINFO_FILENAME);

        $extension = $request->file('cover_image')->getClientOriginalExtension();

        $filenameToStore = $filename . "_" . time() . "." . $extension;

        $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        $album = new Album;

        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;

        $album->save();

        return redirect('/albums')->with('success', 'Альбом создан!');
    }

    public function show($id){
        $album = Album::with('Photos')->find($id);
        return view('albums.show')->with('album', $album);
    }

    public function getDelete($id)
    {
        $album = Album::find($id);

        //Формирование ссылки для удаления заглавного фото альбома
        $link = "/public/album_covers/".$album->cover_image;
        Storage::delete($link);

        //Формирование ссылки для удаления папки с фото альбома
        $directory = "/public/photos/".$id;
        Storage::deleteDirectory($directory);

        $album->delete();

       //Удаление фото данного альбома из базы данных
       $photo = Photo::where('album_id',$id)->delete();



        return Redirect('/gallery');
    }
}
