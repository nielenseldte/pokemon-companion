<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailDoesNotExistYet implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $hash = hash('sha256', strtolower($value));
        if (User::where('email_index_hash', $hash)->exists()) {
            $fail("An account with this $attribute already exists");
        }
    }
}
