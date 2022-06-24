<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Interfaces\User\IUserLogonHourFormat;
use App\Application\User\UserLogonHour;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public $bindings = [
        IUserLogonHourFormat::class => UserLogonHour::class,
    ];
 
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
