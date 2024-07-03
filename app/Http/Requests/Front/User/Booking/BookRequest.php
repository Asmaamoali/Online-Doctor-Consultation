<?php

namespace App\Http\Requests\Front\User\Booking;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required'],
            'category' => ['required', Rule::exists('categories', 'id'), function ($aattribute, $value, $fail) {
                if (isset($value)) {
                    $category = Category::whereHas('doctors')
                        ->find($value);
                    if (!$category) {
                        $fail('Not Found Category');
                    }
                }
            }],
            'sub_category' => ['required', Rule::exists('sub_categories', 'id')->where('category_id', request()->input('category')), function ($aattribute, $value, $fail) {
                if (isset($value)) {
                    $subCategory = SubCategory::whereHas('doctors')
                        ->find($value);
                    if (!$subCategory) {
                        $fail('Not Found Sub-Category');
                    }
                }
            }],
            'doctor' => ['required', Rule::exists('users', 'id')->where('category_id', request()->input('category'))->where('sub_category_id', request()->input('sub_category'))],
            'message' => ['sometimes', 'nullable', 'string', 'max:99999'],
        ];
    }
}
