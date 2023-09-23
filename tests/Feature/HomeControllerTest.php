<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testMember()
    {
        $this->withSession([
            "user" => "mirlani"
            ])->get("/")
            ->assertRedirect("/todolist");
    }
}
