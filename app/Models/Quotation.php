<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    public function secteur()
    {
        return $this->belongsTo(SecteurActivite::class, 'secteur_activite_id');
    }
}
