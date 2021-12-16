<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Inertia\Inertia;
use Illuminate\Http\Request;


class AlbumController extends Controller
{
    public function index(Request $request)
    {
        // Should be replaced by the user id of the logged user
        $myAlbums = Album::where('id_user', '=', 1)->get();

        // Should find a command to get list of sharedAlbuns
        $sharedAlbums = Album::where('id_user', '=', 1)->get();

        return Inertia::render('Album', [
            "myAlbums"=>$myAlbums,
            "sharedAlbums"=>$sharedAlbums,
        ]);
    }

    public function create(Request $request)
    {
        return Inertia::render('CreateAlbum');
    }

    public function gallery(Request $request, $id)
    {
        $photos = Photo::join('albums','photos.id_album', '=', 'albums.id')
            ->where('id_album', '=', $id)
            ->get();
        //dd($photos);
        return Inertia::render('Gallery', [
            "photos"=>$photos,
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
