<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::check('can_do', ['create article']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required|unique:articles|max:255'],
            'content' => ['required'],
            'slug' => ['required|unique:articles'],
            'url' => ['required', 'file', 'max:512'],
            'category_id' => ['required'],
            'tag' => ['nullable|array'],
        ];
    }
}
