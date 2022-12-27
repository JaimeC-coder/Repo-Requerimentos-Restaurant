<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property ProductTag[] $productTags
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tag extends Model
{
    
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productTags()
    {
        return $this->hasMany('App\Models\ProductTag', 'tag_id', 'id');
    }
    

}
