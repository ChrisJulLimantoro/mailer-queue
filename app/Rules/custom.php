<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class custom implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $authorize = ['c14210073@john.petra.ac.id','c14210109@john.petra.ac.id','bem_ukp@petra.ac.id'];
        if (!in_array($value, $authorize)) {
            $fail('The '.$attribute.' is invalid.');
        }
    }
}
