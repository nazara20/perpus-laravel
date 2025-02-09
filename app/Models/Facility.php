<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'name',
        'quantity',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
