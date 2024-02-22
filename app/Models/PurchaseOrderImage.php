<?php
// app/Models/PurchaseOrderImage.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderImage extends Model
{
    protected $fillable = ['purchase_order_id', 'type', 'path'];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }
}

