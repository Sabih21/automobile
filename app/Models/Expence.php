<?php

namespace App\Models;

use App\Models\ExpenceType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expence extends Model
{
    use HasFactory;
    protected $fillable = [
        'expence_type_id',
        'amount',
        'date',
        'description',
    ];

    public function expenceType()
    {
        return $this->belongsTo(ExpenceType::class);
    }
}
