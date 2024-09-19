<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];

    public function facility()
    {
        return $this->hasOne(Facility::class, 'brand_id');
    }
}
