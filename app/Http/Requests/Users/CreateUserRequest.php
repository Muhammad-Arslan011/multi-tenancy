<?php

namespace App\Http\Requests\Users;

use App\Http\Helpers\Helper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'image_url' => 'required|image|mimes:png,jpg, jpeg, gif',
            'password' => ['required', Password::defaults()]
        ];
    }

    public function failedValidation(Validator $validator)
    {
       return Helper::validationError('validation error', $validator->errors());
    }
}
