<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeAbsence extends Model
{
    use HasFactory;

    public function typedemandes()
    {
        return $this->belongsTo(TypeAbsence::class, 'type_absence_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contrats()
    {
        return $this->belongsTo(Contrat::class, 'contrat_id');
    }
}
