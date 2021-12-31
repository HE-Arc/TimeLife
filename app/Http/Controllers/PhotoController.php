<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use DateTime;
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
            $exif = exif_read_data($file);
            if (array_key_exists("GPSLatitude" ,$exif) && array_key_exists("GPSLatitudeRef" ,$exif)) {
                $latitude = $this->gps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);
            }
            else {
                $latitude = "";
            }

            if (array_key_exists("GPSLongitude", $exif) && array_key_exists("GPSLongitudeRef", $exif)) {
                $longitude = $this->gps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
            }
            else {
                $longitude = "";
            }

            $dateTime = array_key_exists("DateTime", $exif) ? new DateTime($exif["DateTime"]) : new DateTime();

            array_push($photosRows, [
               "id_album" => $id,
               "name" =>  $file->getClientOriginalName(),
                "description" => "",
                "filename" => $savedPath,
                "latitude" => $latitude,
                "longitude" => $longitude,
                "date_p" => $dateTime,
                "created_at" => new DateTime(), // Theses two must be specified because Photo::insert doesn't use Eloquent
                "updated_at" => new DateTime(), // Theses two must be specified because Photo::insert doesn't use Eloquent
            ]);
        }

        // The insertion is done like that so we can let the database deal with the bulk insertion.
        Photo::insert($photosRows);

        return Redirect::route("album.gallery", ["id" => $id]);
    }

    /**
     * Convert coordonates from exif format to latitude and longitude format
     *
     * @see https://stackoverflow.com/questions/2526304/php-extract-gps-exif-data
     * @param string $coordinate
     * @param string $hemisphere
     * @return string $coordinate
     */
    private function gps($coordinate, $hemisphere) {
        if (is_string($coordinate)) {
            $coordinate = array_map("trim", explode(",", $coordinate));
        }
        for ($i = 0; $i < 3; $i++) {
            $part = explode('/', $coordinate[$i]);
            if (count($part) == 1) {
            $coordinate[$i] = $part[0];
            } else if (count($part) == 2) {
            $coordinate[$i] = floatval($part[0])/floatval($part[1]);
            } else {
            $coordinate[$i] = 0;
            }
        }
        list($degrees, $minutes, $seconds) = $coordinate;
        $sign = ($hemisphere == 'W' || $hemisphere == 'S') ? -1 : 1;
        return $sign * ($degrees + $minutes/60 + $seconds/3600);
    }

}
