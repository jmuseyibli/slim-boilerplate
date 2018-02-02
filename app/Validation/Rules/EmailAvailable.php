<?php namespace App\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;
use App\Models\User;

// Custom Email Validation with Respect Validation

class EmailAvailable extends AbstractRule {
    
    public function validate($input) {
        return User::where('email', $input)->count() === 0;
    }
    
}