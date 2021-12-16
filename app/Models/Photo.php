<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_album',
        'filename',
        'name',
        'description',
        'latitude',
        'longitude',
        'date_p',
    ];
}
