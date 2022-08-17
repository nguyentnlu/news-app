<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'url',
        'category_id',
        'status',
        'created_by',
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function author(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

}
