<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDate extends Model
{
    use HasFactory;
    
    protected $table = 'post_dates';

    protected $fillable = [
        'nb_day_post',
    ];
}
