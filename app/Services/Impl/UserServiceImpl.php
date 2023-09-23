<?php


namespace App\Services\Impl;

use App\Services\UserService;
use Illuminate\Support\Arr;

class UserServiceImpl implements UserService
{
    private $users = [
        'mirlani' => "rahasia"
    ];

    public function login(string $user, string $password): bool
    {
        
        if(!isset($this->users[$user])){
            return false;
        }

        $correntPassword = $this->users[$user];
        return $password == $correntPassword;
    }
}
