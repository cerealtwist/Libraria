<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => [
                'required',
                'integer'
            ],
            'name' => [
                'required',
                'string'
            ],
            'author' => [
                'required',
                'string'
            ],
            'date_of_issue' => [
                'required',
                'string'
            ],
            'desc' => [
                'required',
                'string'
            ],
            'status' => [
                'nullable',
            ],
            'image' => [
                'nullable',
                // 'image|mimes:jpeg,png,jpg'
            ],
            
        ];
    }
}
