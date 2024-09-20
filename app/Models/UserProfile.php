<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip',
        'address',
        'phone',
        'position_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'profile_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
