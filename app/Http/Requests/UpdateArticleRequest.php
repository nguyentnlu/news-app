<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::check('can_do', ['edit article']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'content' => ['required'],
            'slug' => [
                'required',
                Rule::unique('articles')->ignore($this->route()->article->id),
            ],
            'url' => ['nullable', 'file', 'max:512'],
            'category_id' => ['required'],
            'tag' => 'nullable|array',
        ];
    }
}
