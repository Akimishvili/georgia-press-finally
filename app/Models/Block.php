<?php

namespace App\Models;

use App\Casts\JsonConvertCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'sub_title', 'description', 'image', 'video', 'article_id'];
    protected  $casts = [
        'title' => JsonConvertCast::class,
        'sub_title' => JsonConvertCast::class,
        'description' => JsonConvertCast::class
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
