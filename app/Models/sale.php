<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relation to product
    function rel_to_pro(){
        return $this->belongsTo(product::class, 'product_id');
    }

    // relation to customer
    function rel_to_customer(){
        return $this->belongsTo(customer::class, 'customer_id');
    }
}
