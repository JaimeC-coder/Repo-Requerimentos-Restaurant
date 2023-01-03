<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Table
 *
 * @property $id
 * @property $name
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Order[] $orders
 * @property Reservation[] $reservations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Table extends Model
{

    static $rules = [
		'name' => 'required',
		'status' => 'required',
        'capacity' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','status','capacity'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'table_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation', 'table_id', 'id');
    }


}
