<?php

namespace App\Http\Requests\Admin\Doctor;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $this->route('id')],
            'phone' => ['required', 'digits_between:8,13', 'unique:users,phone,' . $this->route('id')],
            'password' => ['sometimes', 'nullable', 'string', 'min:8', 'max:50'],
            'category_id' => ['required', 'string', 'exists:categories,id'],
            'sub_category_id' => ['required', 'string', Rule::exists('sub_categories', 'id')->where('category_id', request()->input('category_id'))],
            'image' => ['image', 'mimetypes:image/jpeg,image/png,image/webp,image/gif', 'mimes:jpg,jpeg,jfif,png,gif,webp'],
        ];
    }
}
