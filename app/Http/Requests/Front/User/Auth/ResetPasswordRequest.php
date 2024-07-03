<?php

namespace App\Http\Requests\Front\User\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResetPasswordRequest extends FormRequest
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
            'otp' => ['required', 'string', 'max:4', Rule::exists('users', 'otp')->where('role', 'user')],
            'new_password' => ['required', 'string', 'min:8', 'max:50', 'confirmed']
        ];
    }
}
