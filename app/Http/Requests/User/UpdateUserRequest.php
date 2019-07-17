<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $user_id = $this->request->get('user_id');
        return [
            'fullname' => 'required|max:191',
            'email' => 'required|email|unique:users,email,'.$user_id,
//            'password' => 'sometimes|confirmed|min:6',
        ];
    }
}
