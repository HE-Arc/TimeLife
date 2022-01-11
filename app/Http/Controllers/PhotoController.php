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

            $exif = $this->exif_extract($file);

            array_push($photosRows, [
               "id_album" => $id,
               "name" =>  $file->getClientOriginalName(),
                "description" => "",
                "filename" => $savedPath,
                "latitude" => $exif["latitude"],
                "longitude" => $exif["longitude"],
                "date_p" => $exif["date_p"],
                "created_at" => new DateTime(), // Theses two must be specified because Photo::insert doesn't use Eloquent
                "updated_at" => new DateTime(), // Theses two must be specified because Photo::insert doesn't use Eloquent
            ]);
        }

        // The insertion is done like that so we can let the database deal with the bulk insertion.
        Photo::insert($photosRows);

        return Redirect::route("album.gallery", ["id" => $id]);
    }

    /**
     * Extract exif data (latitude, longitude, date) from a given picture
     *
     * @param \Illuminate\Http\UploadedFile $file Picture to extract
     * @return array
     */
    private function exif_extract($file)
    {
        $exif = @exif_read_data($file); // Return false if no data can be read

        $latitude = "";
        $longitude = "";
        $date_p = new DateTime();

        if ($exif) {
            if (array_key_exists("GPSLatitude" ,$exif) && array_key_exists("GPSLatitudeRef" ,$exif)) {
                $latitude = $this->gps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);
            }

            if (array_key_exists("GPSLongitude", $exif) && array_key_exists("GPSLongitudeRef", $exif)) {
                $longitude = $this->gps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
            }

            if (array_key_exists("DateTime", $exif)) {
                try {
                    $date_p = new DateTime($exif["DateTime"]);
                } catch (\Exception $e) {
                    $date_p = new DateTime();
                }
            }
        }

        return [
            "latitude" => $latitude,
            "longitude" => $longitude,
            "date_p" => $date_p
        ];
    }

    /**
     * Convert coordonates from exif format to latitude and longitude format
     *
     * @see https://stackoverflow.com/questions/2526304/php-extract-gps-exif-data
     * @param string $coordinate
     * @param string $hemisphere
     * @return float $coordinate
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
