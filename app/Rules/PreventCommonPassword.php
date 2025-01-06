<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PreventCommonPassword implements Rule
{
    protected $commonPasswords = [
        'picture1',
        'password',
        'password1',
        '12345678',
        '111111',
        '123123',
        '12345',
        '1234567890',
        'senha',
        '1234567',
        'qwerty',
        'abc123',
        'Million2',
        'OOOOOO',
        '1234',
        'iloveyou',
        'aaron431',
        'qqww1122',
        '123',
        'omgpop',
        '123321',
        '654321',
        '123456789',
        'qwerty123',
        '1q2w3e4r',
        'admin',
        'qwertyuiop',
        '555555',
        'lovely',
        '7777777',
        'welcome',
        '888888',
        'princess',
        'dragon',
        '123qwe',
        'sunshine',
        '666666',
        'football',
        'monkey',
        '!@#$%^&*',
        'charlie',
        'aa123456',
        'donald',
    ];

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !in_array($value, $this->commonPasswords);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The chosen password is not strong enough. Try again with a more secure string.';
    }
}
