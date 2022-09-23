<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
        date_default_timezone_set('asia/ho_chi_minh');
    }

    public function getList(array $filter = [])
    {
        $articleTable = $this->article->getTable();
        $query = $this->article->join('categories as c', 'c.id', '=', "{$articleTable}.category_id")
            ->join('users as u', 'u.id', '=', "{$articleTable}.created_by")
            ->select("{$articleTable}.*", 'c.name as category_name', 'u.name as author_name')
            ->filter($filter)
            ->search($filter, ['title', 'c.name', 'u.name']);
        
        return $query->getWithPaginate($filter);
    }

    public function create($data)
    {
        DB::beginTransaction();
        try {
            $fileName = $this->handleFileUpload(Arr::get($data, 'url'));
            $data['url'] = $fileName;

            $data['created_by'] =  auth()->user()->id;
            $data['status'] = false;
            $article = $this->article->create($data);

            $article->tags()->sync(Arr::get($data, 'tag', []));
            DB::commit();

            return $article;
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage());

            return null;
        }
    }
    
    /**
     * @param   \Illuminate\Http\UploadedFile  $file
     */
    public function handleFileUpload(?UploadedFile $file)
    {
        if (is_null($file)) {
            return null;
        }

        $path = Storage::disk('s3')->put('images-article', $file, 'public');

        return $path;
    }

    public function update($data, $article)
    {
        DB::beginTransaction();
        try{
            if (!isset($data['url'])) {
                $data['url'] = $article->url;
            } else {
                Storage::disk('s3')->delete($article->url);
                $data['url'] = $this->handleFileUpload(Arr::get($data, 'url'));
            }

            $article->fill($data)->save();
                
            $article->tags()->sync(Arr::get($data, 'tag', []));
            
            DB::commit();

            return $article;
        } catch(\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return null;
        }
    }

    public function delete(Article $article)
    {
        $article->tags()->detach();
        $article->delete();
    }

    public function setStatus($id)
    {
        $article = Article::find($id);
        $article->status = !($article->status);
        $article->save();

        return 'Successfully change "'.$article->title.'" status!';
    }
}
