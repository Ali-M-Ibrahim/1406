<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        return View('Image.upload');
    }

    // method 1
    public function store(Request $request){
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            // the below function will retrieve the file name
            $filename = $file->getClientOriginalName();

            //to create a custom name
            $newName = time() . "-" . $filename;

            // to create a copy of the image in public folder, we use the below function
            $file->move("myImages", $newName );

            $row = new Image();
            $row->filename = $filename;
            $row->path = "myImages/" . $newName;
            $row->save();
            return redirect()->route('listImages');

        }else{
            return "not found";
        }
    }

    public function list(){
        $images = Image::all();
        return View('Image.list',compact('images'));
    }

    // method 2
    public function store2(Request $request){
        if($request->hasFile('picture')){
            // get Image
            $file = $request->file('picture');

            //get Image name
            $filename = $file->getClientOriginalName();

            //create new name with timestamp
            $newName = time() . "-" . $filename;

            $file->storeAs("method2", $newName,'public');

            $row = new Image();
            $row->filename = $filename;
            $row->path = "storage/method2/" . $newName;
            $row->save();
            return redirect()->route('listImages');

        }else{
            return "not found";
        }
    }

    // method 3

    public function store3(Request $request){
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $filename = $file->getClientOriginalName();
            $path= $file->store("method3", "public");

            $row = new Image();
            $row->filename = $filename;
            $row->path = "storage/" . $path;
            $row->save();
            return redirect()->route('listImages');

        }else{
            return "not found";
        }
    }

}
