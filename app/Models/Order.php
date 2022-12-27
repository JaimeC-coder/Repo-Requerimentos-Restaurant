<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property $id
 * @property $amount
 * @property $table_id
 * @property $employee_id
 * @property $client_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Client $client
 * @property DetailOrder[] $detailOrders
 * @property Employee $employee
 * @property Table $table
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model
{
    
    static $rules = [
		'amount' => 'required',
		'table_id' => 'required',
		'employee_id' => 'required',
		'client_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['amount','table_id','employee_id','client_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->hasOne('App\Models\Client', 'id', 'client_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailOrders()
    {
        return $this->hasMany('App\Models\DetailOrder', 'order_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function table()
    {
        return $this->hasOne('App\Models\Table', 'id', 'table_id');
    }
    

}
