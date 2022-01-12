<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use App\Http\Services\ThumbnailService;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AlbumController extends Controller
{
    protected $thumbnailService;

    function __construct(ThumbnailService $thumbnailService){
        $this->thumbnailService = $thumbnailService;
    }

    public function index(Request $request)
    {
        if(Auth::check())
        {
            // Should be replaced by the user id of the logged user
            $myAlbums = Album::select('users.first_name', 'users.last_name' ,'albums.*')->where('id_user', '=', Auth::user()->id)->join('users', 'users.id', '=', 'albums.id_user')->get();
            $myAlbumsThumbnails = $this->thumbnailService->getThumbnail($myAlbums);

            // Should find a command to get list of sharedAlbums
            $sharedAlbums = Album::select('users.first_name', 'users.last_name' ,'albums.*')->where('is_private', '=', 0)->join('users', 'users.id', '=', 'albums.id_user')->get();
            $sharedAlbumsThumbnails = $this->thumbnailService->getThumbnail($sharedAlbums);


            return Inertia::render('Album', [
                "myAlbums"=>$myAlbums,
                "myAlbumsThumbnails"=>$myAlbumsThumbnails,
                "sharedAlbums"=>$sharedAlbums,
                "sharedAlbumsThumbnails"=>$sharedAlbumsThumbnails,
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

    public function update(Request $request, Album $album)
    {
        $private = $request['isPrivate'] === "true" ? 1 : 0;
        $data = [
            'name' => $request['albumName'],
            'is_private' => $private,
        ];

        $album->update($data);

        return redirect()->route('albums.gallery', ['id' => $album->id]);
    }

    public function gallery(Request $request, $id)
    {
        $photos = Photo::select('photos.*')
            ->join('albums','photos.id_album', '=', 'albums.id')
            ->where('id_album', '=', $id)
            ->get();
        //dd($photos);
        $album = Album::where('id', '=', $id)->first();
        return Inertia::render('Gallery', [
            'user' => Auth::user(),
            "photos" => $photos,
            "galleryId" => $id,
            "album" => $album,
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
