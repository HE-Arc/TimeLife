<?php

namespace App\Http\Middleware;

use App\Models\Album;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Middleware used to ensure that the user has access only on pictures/albums they have the rights to.
 * @package App\Http\Middleware
 */
class EnsureAlbumPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $albumId = "";

        if ($request->routeIs('storage.url') && Storage::disk('album_data')->exists($request->path)) {
            $pieces = explode("/", $request->path);
            if (count($pieces) < 2)
                return redirect()->route("home")->with("error", "You don't have the authorization to be here");

            $albumId = $pieces[0];
        }
        else if ($request->routeIs("albums.*")) {
            $albumId = $request->id;
        }

        if ($albumId !== "")
        {
            // Check if an album exist with a given user id
            $album = Album::where("albums.id", "=", $albumId)->first();

            // Deny access if the album is private and the user requesting the resource is not the owner.
            if ($album->is_private && $album->id_user !== $request->user()->id)
                return redirect()->route("home")->with("error", "You don't have the authorization to be here");
        }

        return $next($request);
    }
}
