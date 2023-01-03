<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $price
 * @property $stock
 * @property $status
 * @property $category_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property DetailOrder[] $detailOrders
 * @property Elaboration[] $elaborations
 * @property ProductTag[] $productTags
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{

    static $rules = [
		'name' => 'required',
		'description' => 'required',
		'price' => 'required',
		'stock' => 'required',
		'status' => 'required',
        'prepared' => 'required',
		//'category_id' => 'required',
    ];


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','price','stock','status','prepared','category_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailOrders()
    {
        return $this->hasMany('App\Models\DetailOrder', 'product_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function elaborations()
    {
        return $this->hasMany('App\Models\Elaboration', 'product_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productTags()
    {
        return $this->hasMany('App\Models\ProductTag', 'product_id', 'id');
    }


}
