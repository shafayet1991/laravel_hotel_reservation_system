<?php

namespace App\Rules;

use App\Helpers\Helper;
use Illuminate\Contracts\Validation\Rule;

class CheckDouble implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        if (Helper::custom_check_double($value) !== false) {
            return $value;
        }
    }

    public function message()
    {
        return ":attribute alanı ondalıklı sayı olmalıdır. Virgül değil nokta kullanınız.";
    }
}
