<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    
    /**
     * 
     */
    public function index(){
        $albums =  Album::with('Photos')->get();
        return view('albums.index')->with('albums',$albums);
    }

    /**
     * @return 
     */
    public function create(){
        return view('albums.create');
    }

    /**
     * 
     */
    public function store(Request $request){
        $this->validate($request , [
            'name' => 'required',
            'cover_image' => 'image|max:1999'
        ]);
        
        //Get the file original name
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        //Get just the file name
        $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
        //Get the extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        //Get the fullname
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        // upload image 
        $path = $request->file('cover_image')->storeAs('public/album_covers',$filenameToStore);
        $album = new Album();
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;
        $album->save();
        return redirect('/albums')->with('success','Album Created');

    }

    /**
     * @return 
     */
    public function show($id){
        $album = Album::with('photos')->find($id);
        return view('albums.show')->with('album',$album);
    }
}
