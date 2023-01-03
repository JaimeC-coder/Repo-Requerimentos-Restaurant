<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailElaboration extends Model
{
    use HasFactory;

    protected $table = 'detail_elaborations';

    protected $fillable = [
        'elaboration_id',
        'supply_id',
        'quantity'
    ];

    public function elaboration()
    {
        return $this->belongsTo(Elaboration::class);
    }

    public function supply()
    {
        return $this->belongsTo(Supply::class);
    }

}
