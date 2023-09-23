<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    //
     private UserService $userService;

     public function __construct(UserService $userService)
     {
        $this->userService = $userService;
     }


    // function yang digunakan untuk menampilkan view login
    public function login():Response
    {
        return response()
        ->view("user.login", [
            "title" => "login",
         
        ]);
    }

    // function digunakan untuk login
    public function doLogin(Request $request): Response|RedirectResponse
    {
        $user = $request->input("user");
        $password = $request->input("password");

        // kita melakukan validate apakah datanya kosong atau tidak
        if (empty($user) || empty($password))
        {
            return response()->view("user.login", [
                "title" => "login",
                "error" => "User atau Password harus di isi"
            ]);
        }

        // apabila berhasil login 
        if($this->userService->login($user, $password))
        {
            $request->session()->put("user", $user);
            return redirect("/");
        }

        // apabila gagal login
        return response()->view("user.login", [
            "title" => "login",
            "error" => "Username atau Password anda salah"
        ]);
    }


    // function yang digunakan untuk logoutnya
    public function doLogout(Request $request):RedirectResponse
    {
        $request->session()->forget("user");
        return redirect("/login");
    }
}
