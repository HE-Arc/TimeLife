<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

        $files = $request->file('images');

        $photosRows = array();

        foreach($files as $file) {
            $savedPath = $file->store("{$id}", 'album_data');

            // TODO: EXIF DATA EXTRACTION

            array_push($photosRows, [
               "id_album" => $id,
               "name" =>  $file->getClientOriginalName(),
                "description" => "",
                "filename" => $savedPath,
                "latitude" => "",
                "longitude" => "",
                "date_p" => new \DateTime("@0"), // 1 January 1970
                "created_at" => new \DateTime(), // Theses two must be specified because Photo::insert doesn't use Eloquent
                "updated_at" => new \DateTime(), // Theses two must be specified because Photo::insert doesn't use Eloquent
            ]);
        }

        // The insertion is done like that so we can let the database deal with the bulk insertion.
        Photo::insert($photosRows);

        return Redirect::route("album.gallery", ["id" => $id]);
    }
}
