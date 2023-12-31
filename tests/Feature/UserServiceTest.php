<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class UserServiceTest extends TestCase
{
    
    private UserService $userService;

    protected function setUp(): void
    {
      parent::setUp();   
      $this->userService = $this->app->make(UserService::class);
    }

   
    public function testLoginSucces()
    {
        assertTrue($this->userService->login("mirlani", "rahasia"));
    }

    public function testLoginUserNotFound()
    {
        assertFalse($this->userService->login("Arman", "salah"));
    }

    public function testLoginWorkPassword()
    {
        assertFalse($this->userService->login("mirlani", "salah"));
    }


}
