<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class BirthdayValidator extends AbstractValidator
{
    protected string $message = 'Поле "Дата рождения" должно быть не ранее 18 лет назад';

    public function rule(): bool
    {
        $currentDate = new \DateTime();
        $birthdayDate = new \DateTime($this->value);
        $ageDifference = $currentDate->diff($birthdayDate);

        return $ageDifference->y >= 18;
    }
}