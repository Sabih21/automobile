<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $primaryKey = 'VehicleID';

    protected $fillable = [
        'Make',  // Add 'Make' to the $fillable array
        'Model',
        'Year',
        'Color',
        'Registration',
        'Amount',
        'LicensePlate',
        'Chassis',
        // 'PurchasePrice',
        'CurrentValue',
        'Condition',
        'FuelType',
        'Mileage',
        'EngineNumber',
        'Membership',
        'Detail_description',
    ];


    public function images()
    {
        return $this->hasMany(VehicleImage::class, 'vehicle_id');
    }
}
