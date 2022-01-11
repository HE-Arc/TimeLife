<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class AlbumController extends Controller
{
    public function index(Request $request)
    {
        // Should be replaced by the user id of the logged user
        $myAlbums = Album::where('id_user', '=', 1)->get();

        // Should find a command to get list of sharedAlbums
        $sharedAlbums = Album::where('id_user', '=', 1)->get();

        return Inertia::render('Album', [
            "myAlbums"=>$myAlbums,
            "sharedAlbums"=>$sharedAlbums,
            'user' => Auth::user(),
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
            'user' => Auth::user(),
            "photos" => $photos,
            "galleryId" => $id
        ]);
    }

    public function map(Request $request)
    {
        gallery();
    }

    public function timeline(Request $request, int $id)
    {
        $photos = Photo::select("date_p", "filename", "photos.name")
            ->where('id_album', '=', $id)
            ->orderBy('date_p')
            ->get();

        return Inertia::render('Timeline', [
            "photos" => $photos,
            "albumId" => $id
        ]);
    }
}
