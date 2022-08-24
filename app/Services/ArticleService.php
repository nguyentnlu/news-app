<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ArticleService
{
    protected $article;

    public function __construct()
    {
        $this->article = new Article();
        date_default_timezone_set('asia/ho_chi_minh');
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

    public function update($data, $article)
    {
        DB::beginTransaction();
        try{
            $fileName = $this->handleFileUpload(Arr::get($data, 'url'));
            if (empty($fileName)) {
                $data['url'] = $article->url;
            } else {
                $filePath = public_path('storage/' . $article->url);
                if (File::exists($filePath)) {
                    unlink($filePath);
                }
                $data['url'] = $fileName;
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

    /**
     * @param   \Illuminate\Http\UploadedFile  $file
     */
    public function handleFileUpload(?UploadedFile $file)
    {
        if (is_null($file)) {
            return null;
        }

        $fileName = date('Ymd_His') . "_" . $file->getClientOriginalName();
        $file->storeAs('public', $fileName);

        return $fileName;
    }

    public function delete(Article $article)
    {
        $article->tags()->detach();
        $article->delete();
    }
}