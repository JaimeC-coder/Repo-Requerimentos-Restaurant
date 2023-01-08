<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductTag
 *
 * @property $id
 * @property $product_id
 * @property $tag_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Product $product
 * @property Tag $tag
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductTag extends Model
{
    
    static $rules = [
		'product_id' => 'required',
		'tag_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id','tag_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tag()
    {
        return $this->hasOne('App\Models\Tag', 'id', 'tag_id');
    }
    

}
