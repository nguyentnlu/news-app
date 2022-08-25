<?php
namespace App\Services;

use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TagService{

    protected $tag;

    public function __construct()
    {
        $this->tag = new Tag();
        date_default_timezone_set('asia/ho_chi_minh');
    }

    public function getList(array $filter = [])
    {
        $query = $this->tag->query()->latest();
        
        return $query->searchAll($filter, ['name', 'slug'])->latest()->paginate(10);
    }

    public function create($data)
    {
        DB::beginTransaction();
        try {
            $tag = Tag::create($data);
            DB::commit();

            return $tag;
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage());

            return null;
        }
    }

    public function update($data, $tag)
    {
        DB::beginTransaction();
        try {
            $tag->fill($data)->save();
            DB::commit();

            return $tag;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return null;
        }
    }

    public function delete(Tag $tag)
    {
        $tag->delete();
    }
}