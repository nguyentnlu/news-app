<?php

namespace App\Support\Trait;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

trait HasSearchAll
{
    public function scopeSearchAll(Builder $query, array $filter = [], $columns)
    {
        if (Arr::has($filter, 'search')) {
            $value = Arr::get($filter, 'search');
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', "%{$value}%");
            }
        }

        return $query;
    }
}