<?php

namespace App\Http\Requests\Hotel\Room;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'max_adult_count' => 'required',
            'max_bed_count' => 'required',
        ];
    }

    public function messages()
    {
        return [];
    }
}
