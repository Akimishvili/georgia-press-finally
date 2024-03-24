<?php

namespace App\Models;

use App\Casts\JsonConvertCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'image', 'date','view', 'uuid','section_id'];
    protected  $casts = [
        'title' => JsonConvertCast::class,
        'description' => JsonConvertCast::class
    ];


    public function docs()
    {
        return $this->hasMany(Doc::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_article');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_article');
    }
    public function section()
    {
        return $this->belongsToMany(Section::class);
    }

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }
}
