<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use Image;

class ImageController extends Controller
{
    public function create()
    {
        return view('frontend.createimage');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, ['file' => 'image|required|mimes:jpeg,png,jpg,gif,svg']);
        $originalImage  = $request->file('file');
        $thumbnailImage = Image::make($originalImage->getRealPath());
        $thumbnailPath  = public_path().'/thumbnail/';
        $originalPath   = public_path().'/images/';
        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        $thumbnailImage->resize(150,150);
        $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName()); 
        $message['image_path'] = url('/thumbnail').'/'.time().$originalImage->getClientOriginalName();
        return response()->json($message); 
    }
}
