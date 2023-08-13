<?php


namespace App\Services\Impl;

use App\Services\UserService;
use Illuminate\Support\Arr;

class UserServiceImpl implements UserService
{
    private $users = [
        'mirlani' => "rahasia"
    ];

    public function login(string $username, string $password): bool
    {
        
        if(!isset($this->users[$username])){
            return false;
        }

        $correntPassword = $this->users[$username];
        return $password == $correntPassword;
    }
}
