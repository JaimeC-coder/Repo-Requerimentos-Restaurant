<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservation
 *
 * @property $id
 * @property $date
 * @property $time
 * @property $client_id
 * @property $table_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Client $client
 * @property Table $table
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reservation extends Model
{
    
    static $rules = [
		'date' => 'required',
		'time' => 'required',
		'client_id' => 'required',
		'table_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','time','client_id','table_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne('App\Models\Client', 'id', 'client_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function table()
    {
        return $this->hasOne('App\Models\Table', 'id', 'table_id');
    }
    

}
