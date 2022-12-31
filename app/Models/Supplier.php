<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 *
 * @property $id
 * @property $name
 * @property $document
 * @property $representative
 * @property $address
 * @property $phone
 * @property $email
 * @property $document_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Document $document
 * @property Supply[] $supplies
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Supplier extends Model
{

    static $rules = [
		'name' => 'required',
		'document' => 'required',
		//'representative' => 'required',
		'address' => 'required',
		'phone' => 'required',
		'email' => 'required',
		'document_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','document','representative','address','phone','email','document_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function document()
    {
        return $this->hasOne('App\Models\Document', 'id', 'document_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supplies()
    {
        return $this->hasMany('App\Models\Supply', 'supplier_id', 'id');
    }


}
