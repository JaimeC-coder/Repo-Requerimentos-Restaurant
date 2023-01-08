<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url'

    ];
    static $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];
    //relacion de uno a uno con la tabla employee
    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }

    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300';
        //este url nos genera imágenes ramdom
    }
    //modificar el nombre de usuario
    public function adminlte_desc()
    {
        return 'Administrador';
    }
    //modificar el rol de usuario
    public function adminlte_profile_url()
    {
        return 'profile/username';
    }
    //modificar el perfil de usuario
    public function adminlte_header()
    {
        return 'key-test';
    }
}
