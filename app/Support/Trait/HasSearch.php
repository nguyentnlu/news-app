<?php

namespace App\Support\Trait;

use Illuminate\Database\Eloquent\Builder;

trait HasSearch
{
    public function scopeSearch(Builder $query, $value, array $columns)
    {
        $query->where(function ($query) use ($columns, $value) {
            foreach($columns as $column) {
                $query->orWhere($column, 'like', "%{$value}%");
            }
        });

        return $query;
    }
}