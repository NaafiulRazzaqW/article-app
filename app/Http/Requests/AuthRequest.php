<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'password' => ['required']
        ];

        if($this->routeIs('registerAction')){
            $rules['name'] = ['required', 'max:255'];
            $rules['email'] = ['required', 'email', 'unique:users,email'];
        }

        return $rules;
    }

    public function messages(): array {
        return [
            'required' => ':attribute required!',
            'email' => ':attribute must be a Email format!',
            'unique' => ':attribute already registered, input another email!'
        ];
    }
}
