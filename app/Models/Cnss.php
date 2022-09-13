<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cnss extends Model
{
    use HasFactory;

    protected $table = 'cnsses';

    protected $fillable = [
        'name_cnss',
    ];
}
