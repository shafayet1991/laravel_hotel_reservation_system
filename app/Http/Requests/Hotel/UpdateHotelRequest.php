<?php

namespace App\Http\Requests\Hotel;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $hotel_id = $this->request->get('hotel_id');
        return [
            'name' => 'required',
            'slug' => 'required|unique:hotels,slug,'.$hotel_id,
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'baby_age_limit' => 'required|numeric',
            'child_age_limit' => 'required|numeric',
            'young_age_limit' => 'required|numeric',
        ];
    }
}
