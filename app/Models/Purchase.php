<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Purchase
 *
 * @property $id
 * @property $quantity
 * @property $supplier_id
 * @property $employee_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee $employee
 * @property PurchaseOrder[] $purchaseOrders
 * @property Supplier $supplier
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Purchase extends Model
{

    static $rules = [

		'supplier_id' => 'required',
		'employee_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['supplier_id','employee_id'];


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
    public function supplier()
    {
        return $this->hasOne('App\Models\Supplier', 'id', 'supplier_id');
    }


}
