<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
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
        // 'password',
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
        return $this->hasOne('App\Models\Employee');
    }


    public function adminlte_image()
    {
        $auth = Auth::user()->profile_photo_url;
        return $auth;
        //este url nos genera imágenes ramdom
    }
    //modificar el nombre de usuario
    public function adminlte_desc()
    {
        $auth = Auth::user()->id;
        $user = User::find($auth);

        return strtoupper($user->getRoleNames()->implode(', '));
    }

    public static function MacthPassword($password, $encrypt_password)
    {
        if (Crypt::decrypt($encrypt_password) == $password) {
            return true;
        } else {
            return false;
        }
    }

    public static function VerifyLogin($email, $password)
    {
        //optener usuario con los el email , password
        $user = User::where('email', $email)->first();
        //verificar si el usuario existe
        if ($user) {
            //verificar si el password es correcto
            if (User::MacthPassword($password, $user->password)) {
                session(['user' => $user]);
                
                return $user;
                // if ($user->status == '1') {
                //     //verificar si el usuario tiene un rol

                //     // if ($user->getRoleNames()->count() > 0) {

                //     // } else {
                //     //     return 'El usuario no tiene un rol asignado';
                //     // }
                // } else {
                //     return 'El usuario se encuentra desactivado';
                // }
            }else{
                return null;
            }
        }else{
            return null;
        }
    }
    //funcion para retornar la session del usuario

    public static function GetSession($user)
    {
        $session = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'status' => $user->status,
            'role' => $user->getRoleNames()->implode(', '),
            'profile_photo_url' => $user->profile_photo_url,
        ];
        return $session;
    }




    //modificar el rol de usuario
    // public function adminlte_profile_url()
    // {
    //     return 'profile/username';
    // }
    //modificar el perfil de usuario
    // public function adminlte_header()
    // {
    //     return 'key-test';
    // }
}
