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
        // Data validation. A redirect is automatically done on invalid data.
        $request->validate([
            "images" => "required",
            "images.*" => "image|mimes:jpg,png,jpeg|max:3000"
        ]);

        return response()->json(["error" => "tes2"]);

        return Redirect::route("album.gallery", ["id" => $id]);
    }
}
