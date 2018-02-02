<?php namespace App\Auth;
use App\Models\User;
class Auth {
    
    public function user() {
        return User::find($_SESSION['user']);
    }
    
    public function check() {
        return isset($_SESSION['user']);
    }
    
    public function attempt($input, $password) {
        $user = User::where('email', $input)->orWhere('username', $input)->first();
        if (!$user) {
            return false;
        }
        if (password_verify($password, $user->password)) {
            $_SESSION['user'] = $user->id;
            return true;
        }
        return false;
    }
    
    public function logout() {
        unset($_SESSION['user']);
    }
}