<?php

namespace App\Providers;

use App\Services\Impl\UserServiceImpl;
use App\Services\UserService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    // ini properti ini digunakan apa bila class yang kita gunakan
    // tidak meniject atau membutuhkan kelas lain 
    public array $singletons = [
        UserService::class => UserServiceImpl::class
    ];
    public function provides():array
    {
        return [UserService::class];
    }

    /**
     * Register services.
     */
    // function ini dugunakan ketika ada class yang dedensi atau inject ke class lain
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
