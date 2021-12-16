<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {
        return Inertia::render('Upload');
    }
}
