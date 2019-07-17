<?php

namespace App\Http\Requests\Hotel;

use App\Rules\CheckDouble;
use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|unique:hotels',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'baby_age_limit' => 'required|numeric',
            'child_age_limit' => 'required|numeric',
            'young_age_limit' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
