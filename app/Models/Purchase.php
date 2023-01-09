<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Purchase
 *
 * @property $id
 * @property $quantity
 * @property $supply_id
 * @property $employee_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee $employee
 * @property PurchaseOrder[] $purchaseOrders
 * @property Supply $supply
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Purchase extends Model
{
    
    static $rules = [
		'quantity' => 'required',
		'supply_id' => 'required',
		'employee_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['quantity','supply_id','employee_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseOrders()
    {
        return $this->hasMany('App\Models\PurchaseOrder', 'purchase_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function supply()
    {
        return $this->hasOne('App\Models\Supply', 'id', 'supply_id');
    }
    

}
