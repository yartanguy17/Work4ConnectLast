<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignaleAbsence extends Model
{
    use HasFactory;

    protected $table = 'signale_absences';

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
