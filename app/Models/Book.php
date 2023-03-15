<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'category_id',
        'name',
        'author',
        'desc',
        'date_of_issue',
        'status',

    ];

    public function bookImages()
    {
        return $this->hasMany(BookImage::class, 'book_id', 'id');
    }
}
