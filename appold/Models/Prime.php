<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prime extends Model
{
    use HasFactory;

    public function contrats()
    {
        return $this->belongsTo(Contrat::class);
    }
}
