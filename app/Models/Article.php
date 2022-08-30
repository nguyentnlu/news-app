<?php

namespace App\Models;

use App\Support\Trait\HasFilter;
use App\Support\Trait\HasPagination;
use App\Support\Trait\HasSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, 
        HasSearch, 
        SoftDeletes, 
        HasPagination, 
        HasFilter;

    public const ENABLE_STATUS = true;
    public const DISABLE_STATUS = false;

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

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
