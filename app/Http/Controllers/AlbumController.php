<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Inertia\Inertia;
use Illuminate\Http\Request;


class AlbumController extends Controller
{
    public function index(Request $request, $id)
    {
        gallery($request, $id);
    }

    public function gallery(Request $request, $id)
    {
        $photos = Photo::join('albums','photos.id_album', '=', 'albums.id')
            ->where('id_album', '=', $id)
            ->get();
        //dd($photos);
        return Inertia::render('Gallery', [
            "photos" => $photos,
            "galleryId" => $id
        ]);
    }

    public function map(Request $request)
    {
        gallery();
    }

    public function timeline(Request $request)
    {
        gallery();
    }

}
