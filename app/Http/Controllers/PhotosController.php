<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function create($album_id){
        // return "check";
        return view('photos.create')->with('album_id',$album_id);
    }
    
    /**
     * 
     */
    public function store(Request $request){
        $this->validate($request , [
            'title' => 'required',
            'photo' => 'image|max:1999'
        ]);
        
        //Get the file original name
        $filenameWithExt = $request->file('photo')->getClientOriginalName();
        //Get just the file name
        $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
        //Get the extension
        $extension = $request->file('photo')->getClientOriginalExtension();
        //Get the fullname
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        // upload image 
        $path = $request->file('photo')->storeAs('public/photos',$filenameToStore);
        //create photo
        $photo = new photo;
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getSize();
        $photo->photo = $filenameToStore;
        $photo->save();
        return redirect('/albums/'.$request->input('album_id'))->with('success','Photo Uploaded'); 
    }
    public function show($id){

        $photo = Photo::find($id);

        return view('photos.show')->with('photo',$photo);
    }
    public function destroy($id){
        $photo = Photo::find($id);

        if(Storage::delete('public/photos/'.$photo->photo)){
            $photo->delete();
        
        }
        // $photo->delete();

        return redirect('/albums')->with('success','Photo Deleted');
    }

    }
