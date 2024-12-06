<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidWordSearchBoard implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $lengths = array_map("strlen", $value);
        $allEqual = count(array_unique($lengths)) === 1;

        // Equal row length check
        if (!$allEqual) {
            $fail("The :attribute must be rectangular-shaped (all rows must be equal length)");
        }

        // ASCII characters only check
        foreach ($value as &$row) {
            if (!ctype_alpha($row)) {
                $fail("The :attribute must only contain ASCII characters");
            }
        }
    }
}
