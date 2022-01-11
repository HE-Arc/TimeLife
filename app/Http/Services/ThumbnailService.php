<?php
namespace App\Http\Services;

use App\Models\Photo;

class ThumbnailService {

    public function getThumbnail($albums)
    {
        $thumbnail = array();

        foreach ($albums as $album ) {
            $photo = Photo::where('id_album', '=', $album->id)
            ->first();
            if ($photo) {
                $thumbnail[$album->id] = route('storage.url', $photo->filename);
            }
            else {
                $thumbnail[$album->id] = "";
            }
        }
        return $thumbnail;
    }
}