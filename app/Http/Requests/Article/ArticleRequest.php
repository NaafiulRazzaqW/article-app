<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            "title" => ['required', 'string', 'max:255'],
            "image" => ['nullable', 'image', 'mimes:jpeg,png,jpg'],
            "description" => ['required', 'string']
        ];

        if ($this->routeIs('createArticleAction')) {
            $rules['image'] = 'required|image|mimes:png,jpg,jpeg';
        } else {
            $rules['image'] = 'nullable|image|mimes:png,jpg,jpeg';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute required!',
            'unique' => ':attribute already registered, input another email!',
            'image' => ':attribute must be a image!',
            'mimes' => 'must be a JPG & PNG!'
        ];
    }


}
