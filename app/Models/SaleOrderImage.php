<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrderImage extends Model
{
    protected $fillable = ['sale_order_id', 'type', 'path'];

    public function saleOrder()
    {
        return $this->belongsTo(SaleOrder::class);
    }

    
}
