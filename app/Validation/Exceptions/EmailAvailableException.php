<?php namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

// Custom Email Validation Exception with Respect Validation
class EmailAvailableException extends ValidationException {
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Email is already taken...',
        ],
    ];
}