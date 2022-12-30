<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 *
 * @property $id
 * @property $DNI
 * @property $phone
 * @property $address
 * @property $city
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Elaboration[] $elaborations
 * @property Order[] $orders
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employee extends Model
{

    public static $rules = [
		'DNI' => 'required',
        'email' => 'required',
        'password' => 'required',
        'name' => 'required',
		'phone' => 'required',
		'address' => 'required',
		'city' => 'required'
    ];



    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['DNI','phone','address','city','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function elaborations()
    {
        return $this->hasMany('App\Models\Elaboration', 'employee_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'employee_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }


}
