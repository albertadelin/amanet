<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $primaryKey = 'contract_id';

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
