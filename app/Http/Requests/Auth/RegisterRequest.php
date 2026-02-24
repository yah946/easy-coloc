<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'name'=>'string|min:3|max:50',
            'email'=>'string|email|unique:users,email|regex:/^[a-zA-Z0-9._%+-]{,50}@[a-zA-Z]+\.[a-zA-Z]{2,3}$/',
            'password'=>'confirmed|string|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$#]).{8,}$/'
        ];
    }
}
