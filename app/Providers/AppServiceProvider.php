<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Interfaces\User\IUserLogonHourFormat;
use App\Http\Interfaces\User\IUserBytesHours;
use App\Http\Interfaces\User\IUserLdap;
use App\Application\User\UserLongonHoursFormat;
use App\Application\User\UserBytesHours;
use App\Application\User\UserLdap;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public $bindings = [
        IUserBytesHours::class => UserBytesHours::class,
        IUserLogonHourFormat::class => UserLongonHoursFormat::class,
        IUserLdap::class => UserLdap::class,
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
