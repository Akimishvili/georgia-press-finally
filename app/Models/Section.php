<?php

namespace App\Models;

use App\Casts\JsonConvertCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'languages'];
    protected  $casts = [
        'title' => JsonConvertCast::class,
        'languages' => JsonConvertCast::class
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
