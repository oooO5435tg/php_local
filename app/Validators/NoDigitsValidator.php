<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class NoDigitsValidator extends AbstractValidator
{
    protected string $message = 'Поле :field не должно содержать цифры';

    public function rule(): bool
    {
        return (bool)!preg_match('/\d/', $this->value);
    }
}