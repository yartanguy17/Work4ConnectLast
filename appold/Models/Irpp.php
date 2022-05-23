<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Irpp extends Model
{
    use HasFactory;

    protected $table = 'irpps';

    protected $fillable = [
        'name_irpp',
    ];
}
