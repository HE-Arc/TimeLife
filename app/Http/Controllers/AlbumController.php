<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Inertia\Inertia;


class AlbumController extends Controller
{
    public function index()
    {
        gallery();
    }

    public function gallery()
    {
        return Inertia::render('Gallery', [

        ]);
    }

    public function map()
    {
        gallery();
    }

    public function timeline()
    {
        gallery();
    }

}
