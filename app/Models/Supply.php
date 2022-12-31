<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Supply
 *
 * @property $id
 * @property $name
 * @property $stock
 * @property $supplier_id
 * @property $created_at
 * @property $updated_at
 *
 * @property DetailElaboration[] $detailElaborations
 * @property Supplier $supplier
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Supply extends Model
{
    
    static $rules = [
		'name' => 'required',
		'stock' => 'required',
		'supplier_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','stock','supplier_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailElaborations()
    {
        return $this->hasMany('App\Models\DetailElaboration', 'supply_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function supplier()
    {
        return $this->hasOne('App\Models\Supplier', 'id', 'supplier_id');
    }
    

}
