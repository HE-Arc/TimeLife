<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Single method controller handling the request of picture from the albums.
 * The controller does not check file permission or anything like that (only the existence of the file), the middleware is in charge of that.
 * Done this way instead of a symlink to be able to enforce permission on file.
 */
class StorageController
{
    public function __invoke(Request $request, $path)
    {
        abort_if(
            ! Storage::disk('album_data') ->exists($path),
            404,
            "The file doesn't exist. Check the path."
        );

        return Storage::disk('album_data')->response($path);
    }
}
