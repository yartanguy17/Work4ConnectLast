<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'location', 'bio', 'avatar', 'avatar_status'];

    /**
     * A profile belongs to a user.
     *
     * @return mixed
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
