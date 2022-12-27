<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Document
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property Supplier[] $suppliers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Document extends Model
{

    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suppliers()
    {
        return $this->hasMany('App\Models\Supplier', 'document_id', 'id');
    }


}
