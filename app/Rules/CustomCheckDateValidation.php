<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CustomCheckDateValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail)
    {
        $addEmpHiredate = explode("-", $value);

        return !checkdate($addEmpHiredate[0], $addEmpHiredate[1], $addEmpHiredate[2]);
    }

    public function message()
    {
        return 'そんな日付はねぇ！！';
    }
}
