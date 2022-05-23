<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class Admin  extends Authenticatable
{
    use HasRoles, Notifiable;

    protected $table = 'admins';
    public $timestamps = true;
    protected $guard_name = 'admin';

    protected $fillable = [
        'last_name', 'first_name', 'phone_number', 'email', 'password', 'address', 'profile_picture', 'email_verfied_at'
    ];

    protected $hidden = ['password'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }

    public function demandeformations()
    {
        return $this->hasMany(DemandeFormation::class);
    }

    public function applies()
    {
        return $this->hasMany(Apply::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
