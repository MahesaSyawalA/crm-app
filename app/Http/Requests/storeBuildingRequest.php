<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeBuildingRequest extends FormRequest
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
            'code_building' => ['required', 'unique:buildings'],
            'name_building' => ['required'],
            'address_building' => ['required'],
            'image_building' => ['image', 'file', 'max:2048']
        ];
    }
}
