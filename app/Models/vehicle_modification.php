<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle_modification extends Model
{
    protected $fillable = [
    'modification',
     'VehicleID',
    'description',
    'data',
    'amount',
];

}
