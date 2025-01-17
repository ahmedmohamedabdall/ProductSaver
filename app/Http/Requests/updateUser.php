<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateUser extends FormRequest
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
            'name' => 'required|min:5|max:20',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:20',
            'bio' => 'nullable|min:5|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
