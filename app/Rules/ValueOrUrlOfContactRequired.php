<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValueOrUrlOfContactRequired implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !empty(request('value')) || !empty(request('url'));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Either value or url must be given';
    }
}
