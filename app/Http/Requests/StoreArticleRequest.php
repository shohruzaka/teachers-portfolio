<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Ruxsatlarni ArticlePolicy va Controller orqali boshqaramiz
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255|unique:articles,title',
            'annotation' => 'required|string',
            'journal_name' => 'required|string|max:255',
            'pub_date' => 'required|date',
            'file_url' => 'required|file|mimes:pdf,doc,docx|max:10240', // max 10MB
            'users' => 'nullable|array',
            'users.*' => 'exists:users,id'
        ];
    }
}
