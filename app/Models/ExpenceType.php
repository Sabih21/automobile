<?php

namespace App\Models;

use App\Models\Expence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpenceType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function expences()
    {
        return $this->hasMany(Expence::class);
    }
}
