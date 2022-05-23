<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;

    protected $table = 'conges';

    public function typeconges()
    {
        return $this->belongsTo(TypeConge::class, 'type_conge_id');
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
