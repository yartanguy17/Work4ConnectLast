<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function clients()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function prestataires()
    {
        return $this->belongsTo(User::class, 'prestataire_id');
    }
}
