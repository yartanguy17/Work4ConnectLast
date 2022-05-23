<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contrat extends Model
{
    use HasFactory, SoftDeletes;

    public function type()
    {
        return $this->belongsTo(TypeContrat::class, 'type_contrat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function prestataire()
    {
        return $this->belongsTo(User::class, 'prestataire_id');
    }

    public function admins()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function villes()
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }
}
