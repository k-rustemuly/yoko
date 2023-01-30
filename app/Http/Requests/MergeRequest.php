<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MergeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'first' => 'required|file|mimes:json',
            'second' => 'required|file|mimes:json',
        ];
    }

    public function messages()
    {
        return [
            'first.required' => __('File first is required')
        ];
    }
}
