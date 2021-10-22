<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'category_id' => 'required',
            'body' => 'required|max:2000',
            // 'thumbnail' => '',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'category_id' => 'カテゴリー',
            'body' => '本文',
            // 'thumbnail' => 'サムネイル用画像',
        ];
    }
}
