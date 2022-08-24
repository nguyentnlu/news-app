<?php

namespace App\Models;

use App\Support\Trait\HasSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory, HasSearch;

    const ENABLE_STATUS = true;
    const DISABLE_STATUS = false;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'url',
        'category_id',
        'status',
        'created_by',
    ];

    public function getImageUrlAttribute()
    {
        $value = $this->attributes['url'];

        if (preg_match('/^http(s)*\:\/\/[a-zA-Z0-9\-_\.]+\//i', $value)) {
            return $value;
        }

        return Storage::url($value);
    }
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
