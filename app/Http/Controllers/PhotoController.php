<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {
        return Inertia::render('Upload');
    }

    public function store(Request $request, int $id)
    {
        return response()->json(["error" => "test"]);

        $request->validate([
            "images" => "required",
            "images.*" => "image|mimes:jpg,png,jpeg|max:10"
        ]);

        return response()->json(["error" => "tes2"]);

        $filenameWithExt = $request->file('image')->getClientOriginalName();// Get Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);// Get just Extension
        $extension = $request->file('image')->getClientOriginalExtension();// Filename To store
        $fileNameToStore = $filename. '_'. time().'.'.$extension;// Upload Image$path = $request->file(‘image’)->storeAs(‘public/image’, $fileNameToStore);
    }
}
