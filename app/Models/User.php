<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Carbon\Carbon;
use DateTime;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'users';
    public $timestamps = true;
    protected $guard_name = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name',
        'email',
        'password',
        'first_name',
        'phone_number',
        'address',
        'profile_picture',
        'is_activated',
        'email_token',
        'verification_code',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

        'email_verified_at' => 'datetime',
    ];


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {

        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {

        return [];
    }

    public static function getUserClient(){
        return User::with(['user_type'])->where('type_users','client');
    }

    public static function getUserPrestataire(){
        return User::with(['user_type'])->where('type_users','prestataire');
    }

    public function villes()
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }

    public function contratsClient()
    {

        return $this->hasMany(Contrat::class, 'client_id');
    }

    public function contratsPrestataire()
    {

        return $this->hasMany(Contrat::class, 'prestataire_id');
    }

    public function secteurs()
    {
        return $this->belongsTo(SecteurActivite::class, 'secteur_activite_id');
    }

    public function age()
    {
        return  Carbon::parse($this->birth_date)->age;
    }

    function calcutateAge($dob)
    {
        $dobObject = new DateTime(date("Y-m-d", strtotime($dob)));
        $nowObject = new DateTime();

        return $dobObject < $nowObject ? ($dobObject->diff($nowObject)->y < 13) : false;
    }
}
