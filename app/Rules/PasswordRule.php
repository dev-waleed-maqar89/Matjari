<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cl = '/[A-Z]/';
        $sl = '/[a-z]/';
        $num = '/[0-9]/';
        $spc = '/[*,#,_]/';
        $msg = 'The :attribute must contain: {capital letter, small letter, a number, and spchar(* or # or _)}';
        if (!(preg_match($cl, $value)
            && preg_match($sl, $value)
            && preg_match($num, $value)
            && preg_match($spc, $value))) {
            $fail($msg);
        }
    }
}
