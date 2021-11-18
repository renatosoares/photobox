<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'custom_properties' => json_decode($this->custom_properties, true),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'custom_properties.author' => ['required', 'max:255', 'string'],
            'custom_properties.description' => ['required', 'max:255', 'string'],
            'custom_properties.keywords' => ['required', 'array'],
            'custom_properties.title' => ['required', 'max:255', 'string'],
            'media_file' => ['required', 'file'],
        ];
    }
}
