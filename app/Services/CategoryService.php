<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryService
{
    protected $category;

    public function __construct()
    {
        $this->category = new Category();
        date_default_timezone_set('asia/ho_chi_minh');
    }

    public function create($data)
    {
        DB::beginTransaction();
        try {
            $category = $this->category->create($data);
            if (isset($data['tag'])) {
                $category->tags()->sync(Arr::get($data, 'tag', []));
            }
            DB::commit();

            return $category;
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage());

            return null;
        }
    }

    public function update($data, $category)
    {
        DB::beginTransaction();
        try {
            $category->fill($data)->save();

            if (isset($data['tag'])) {
                $category->tags()->sync(Arr::get($data, 'tag', []));
            }
            DB::commit();

            return $category;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return null;
        }
    }

    public function delete(Category $category)
    {
        $category->tags()->detach();
        $category->delete();
    }

    public function search($filter)
    {
        foreach (Arr::get($filter, 'search') as $column => $value) {
            $categories = Category::where($column, 'like', "%{$value}%")->get();
        }

        return $categories;
    }
}
