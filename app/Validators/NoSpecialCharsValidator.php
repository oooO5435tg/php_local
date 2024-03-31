<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class NoSpecialCharsValidator extends AbstractValidator
{

    protected string $message = 'Field :field must not contain special characters';

    public function rule(): bool
    {
        $symbols = '!@#$%^&*()_+}{":?><';
        if(preg_match('/['.$symbols.']/', $this->value)){
            return false;
        }
        return true;
    }
}