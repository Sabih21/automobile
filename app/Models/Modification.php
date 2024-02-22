<?php
// app/Models/Modification.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    use HasFactory;

    protected $table = 'modifications';
    public $totalAmount;

    protected $fillable = [
        'vehicle_id',
        'part_name',
        'price',
        'description',
        'date_time',
    ];

    // Define the relationship with the Vehicle model
    // public function vehicle()
    // {
    //     return $this->belongsTo(Vehicle::class);
    // }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

}
