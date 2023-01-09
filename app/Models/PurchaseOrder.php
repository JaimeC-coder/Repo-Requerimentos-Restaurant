<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseOrder
 *
 * @property $id
 * @property $purchase_id
 * @property $supply_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Purchase $purchase
 * @property Supply $supply
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PurchaseOrder extends Model
{
    
    static $rules = [
		'purchase_id' => 'required',
		'supply_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['purchase_id','supply_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function purchase()
    {
        return $this->hasOne('App\Models\Purchase', 'id', 'purchase_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function supply()
    {
        return $this->hasOne('App\Models\Supply', 'id', 'supply_id');
    }
    

}
