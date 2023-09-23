<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->get("/login")
            ->assertSeeText("login");
    }

    // user yang sudah melakukan login
    public function testLoginForMember()
    {
        $this->withSession([
            "user" => "mirlani"
        ])->get("/login")
        ->assertRedirect("/");
    }



    // 
    public function testLoginSucces()
    {
        $this->post("/login", [
            "user" => "mirlani",
            "password" => "rahasia"
        ])->assertSessionHas("user", "mirlani")
            ->assertRedirect("/");
    }


    public function testLoginSudahMelakukanLogin()
    {
        $this->withSession([
            "user" => "mirlani"
        ])->post("/login", [
            "user" => "mirlani",
            "password" => "rahasia"
        ])->assertRedirect("/");
    }

    public function testValidateError()
    {
        $this->post("/login", [])
        ->assertSeeText("User atau Password harus di isi");
    }

    public function testLoginFailed()
    {
        $this->post("/login", [
            "user" => "araman",
            "password" => "gagal"
        ])->assertSeeText("Username atau Password anda salah");
    }
    
    
    
        public function testLogout()
        {
            // membuat session di unitesting
            $this->withSession([
                "user" => "mirlani"
            ])->post("/logout")
            ->assertRedirect("/login")
            ->assertSessionMissing("user");
        }
    
    
        public function testLogoutGuest()
        {
            // 
            $this->post("/logout")
            ->assertRedirect("/login");
        }
    
        

}
