<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;
    protected $fillable = ['vehicle_id', 'saleorder_id', 'amount'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
    
 // Example in InstalmentHistory model
public function saleOrder()
{
    return $this->belongsTo(SaleOrder::class, 'saleorder_id');
}

    
}