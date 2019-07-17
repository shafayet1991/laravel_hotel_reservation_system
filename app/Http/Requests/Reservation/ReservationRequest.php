<?php

namespace App\Http\Requests\Reservation;

use App\Helpers\Helper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ReservationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        $rules = [
            'person_name' => 'required|max:20',
            'person_surname' => 'required|max:20',
            'person_email' => 'required|max:150|email',
            'person_mobile' => 'required|max:30',
        ];


        if($request->exists('adult_name')){
            foreach($this->request->get('adult_name') as $adult_key => $val) {
                $rules['adult_name.'.$adult_key] = 'required';
                $rules['adult_surname.'.$adult_key] = 'required';
                $rules['adult_gender.'.$adult_key] = 'required';
                $rules['adult_birthday.'.$adult_key] = 'required';
            }
        }

        if($request->exists('child_name')) {
            foreach ($this->request->get('child_name') as $child_key => $val) {
                $rules['child_name.' . $child_key] = 'required';
                $rules['child_surname.' . $child_key] = 'required';
                $rules['child_gender.' . $child_key] = 'required';
                $rules['child_birthday.' . $child_key] = 'required';
            }
        }

        return $rules;

    }

    public function messages()
    {
        $messages = [];

        if(Helper::custom_check_empty($this->request->get('child_name')) !== false) {
            $frontent_adult_index=0;
            foreach ($this->request->get('adult_name') as $adult_child => $val) {
                $messages['adult_name.' . $adult_child . '.required'] = ++$frontent_adult_index . ". yetişkin için ad kısmını giriniz";
                $messages['adult_surname.' . $adult_child . '.required'] = $frontent_adult_index . ". yetişkin için soyad kısmını giriniz";
                $messages['adult_gender.' . $adult_child . '.required'] = $frontent_adult_index . ". yetişkin için cinsiyet kısmını giriniz";
                $messages['adult_birthday.' . $adult_child . '.required'] = $frontent_adult_index . ". yetişkin için doğum tarihini kısmını giriniz";
            }
        }

        if(Helper::custom_check_empty($this->request->get('child_name')) !== false){
            $frontend_child_index=0;
            foreach($this->request->get('child_name') as $child_index => $val) {
                $messages['child_name.'.$child_index.'.required'] = ++$frontend_child_index. ". çoçuk için ad kısmını giriniz";
                $messages['child_surname.'.$child_index.'.required'] = $frontend_child_index. ". çoçuk için soyad kısmını giriniz";
                $messages['child_gender.'.$child_index.'.required'] = $frontend_child_index. ". çoçuk için cinsiyet kısmını giriniz";
                $messages['child_birthday.'.$child_index.'.required'] = $frontend_child_index. ". çoçuk için doğum tarihini kısmını giriniz";
            }
        }

        return $messages;
    }
}
