<?php

namespace App\Models;

use App\Support\Trait\HasSearchAll;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory, HasSearchAll;

    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    public function categories()
    {
        return $this->morphedByMany(Category::class, 'taggable');
    }
}
