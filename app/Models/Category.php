<?php

namespace App\Models;

use App\Support\Trait\HasSearchAll;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasSearchAll;

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
