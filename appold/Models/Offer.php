<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    public function getLink()
    {
        return url('offre/' . $this->slug);
    }

    public function secteurs()
    {
        return $this->belongsTo(SecteurActivite::class, 'secteur_activite_id');
    }

    public function typecontrat()
    {
        return $this->belongsTo(TypeContrat::class, 'type_contrat_id');
    }

    public function types()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function villes()
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function applies()
    {
        return $this->hasMany(Apply::class);
    }
}
