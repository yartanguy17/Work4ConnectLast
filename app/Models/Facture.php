<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    public function contrat()
    {
        return $this->belongsTo(Contrat::class, 'contrat_id');
    }
}
