<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorise extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_album',
        'id_user',
        'condition',
    ];
}
