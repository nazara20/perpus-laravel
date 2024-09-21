<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'book_code_id',
        'title',
        'description',
        'year',
        'publisher',
    ];

    // Relasi One To One
    public function bookCode()
    {
        return $this->belongsTo(BookCode::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
