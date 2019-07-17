<?php

namespace App\Http\Requests\Hotel\Theme;

use Illuminate\Foundation\Http\FormRequest;

class UpdateThemeRequest extends FormRequest
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
        $theme_id = $this->request->get('theme_id');
        return [
            'name' => 'required|max:191',
            'slug' => 'required|max:191|unique:themes,slug,'.$theme_id,
        ];
    }
}
