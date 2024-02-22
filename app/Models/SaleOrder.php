<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    protected $fillable = [
        // 'Membership',
        // 'Make',
        // 'Model',
        // 'Registration',
        // 'EngineNumber',
        // 'Chassis',
        // 'Color',
        'vehicle_id',
        'customer_id',
        'serial_of_reg_book',
        'serial_of_reg_challan',
        'deal_locked',
        'regd_book_date',
        'regd_file_date',
        'documents_date',
        'jackrod',
        'wheels_caps',
        'service_book',
        'tape_recorder',
        'spare_wheel',
        'warranty_books',
        'lighter',
        'air_conditioner',
        'remarks',
        'car_touchups',
        'balance_inspection',
        'owner_name',
        'owner_address',
        'balance_rs',
        'balance_paid',
        'advance_rs',
        'no_of_installment' => 1,
        'installment_amount',
        'paid_amount',
    ];
    public function images()
    {
        return $this->hasMany(SaleOrderImage::class);
    }
    
    public function vehicle()
        {
            return $this->belongsTo(Vehicle::class, 'vehicle_id');
        }
        
        public function customer()
        {
            return $this->belongsTo(Customer::class, 'customer_id');
        }
    }
    
