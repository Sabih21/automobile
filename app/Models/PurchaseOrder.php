<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'membership_no',
        'make',
        'model',
        'regis_no',
        'serial_of_reg_book',
        'engine_no',
        'chassis_no',
        'colour',
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
    ];


  // PurchaseOrder model
  public function images()
  {
      return $this->hasMany(PurchaseOrderImage::class);
  }

    // public function vehicle()
    // {
    //     return $this->belongsTo(Vehicle::class, 'vehicle_id');
    // }
}
