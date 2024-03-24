<?php

namespace App\Models;

use App\Casts\JsonConvertCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'image'];
    protected  $casts = [
        'first_name' => JsonConvertCast::class,
        'last_name' => JsonConvertCast::class
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'author_article');
    }
}
