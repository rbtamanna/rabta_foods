<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'code', 'product_id', '	customer_id', 'quantity',  'price', 'status',
    ];
}
