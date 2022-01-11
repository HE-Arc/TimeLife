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
        if(Auth::check())
        {
            // Should be replaced by the user id of the logged user
            $myAlbums = Album::where('id_user', '=', Auth::user()->id)->join('users', 'users.id', '=', 'albums.id_user')->get();

            // TODO: List of album shared with a user
            $sharedAlbums = Album::where('is_private', '=', 0)->join('users', 'users.id', '=', 'albums.id_user')->get();

            return Inertia::render('Album', [
                "myAlbums"=>$myAlbums,
                "sharedAlbums"=>$sharedAlbums,
                'user' => Auth::user(),
            ]);
        }
        else
        {
            return redirect()->route('login')->with('error', 'You have to be connected to access this page');
        }
    }

    public function create(Request $request)
    {
        return Inertia::render('CreateAlbum');
    }

    public function store(Request $request)
    {
        $private = $request['isPrivate'] === "true" ? 1 : 0;
        $data = [
            'id_user' => Auth::user()->id,
            'name' => $request['albumName'],
            'save_dir' => "/testDir",
            'is_private' => $private,
        ];
        Album::create($data);

        return redirect()->route('albums.index');
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

    public function timeline(Request $request)
    {
        gallery();
    }

}

Inertia::share('user', fn (Request $request) => $request->user()
        ? $request->user()->only('last_name', 'first_name')
        : null
);
