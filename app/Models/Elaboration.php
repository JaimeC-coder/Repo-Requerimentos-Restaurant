<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Elaboration
 *
 * @property $id
 * @property $cuantity
 * @property $product_id
 * @property $employee_id
 * @property $created_at
 * @property $updated_at
 *
 * @property DetailElaboration[] $detailElaborations
 * @property Employee $employee
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Elaboration extends Model
{

    static $rules = [
		'cuantity' => 'required',
		'product_id' => 'required',
		'employee_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cuantity','product_id','employee_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailElaborations()
    {
        return $this->hasMany(DetailElaboration::class, 'elaboration_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }


}
