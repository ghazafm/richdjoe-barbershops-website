<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WithinAllowedTimeRange implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $schedule = \Carbon\Carbon::parse($value);
        $allowedStartTime = \Carbon\Carbon::parse('09:00:00');
        $allowedEndTime = \Carbon\Carbon::parse('21:00:00');
        return $schedule->between($allowedStartTime, $allowedEndTime);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be between 09:00 AM and 09:00 PM.';
    }
}
