<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kachaproduct extends Model
{
    use HasFactory;

    // relation to seller
    function rel_to_seller(){
        return $this->belongsTo(seller::class, 'seller_id');
    }

    // relation to kachamal
    function rel_to_kacha(){
        return $this->belongsTo(kachamal::class, 'kacha_id');
    }
}
