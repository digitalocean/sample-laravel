<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
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
        Schema::defaultStringLength(191);
    }


    /**
 * Bootstrap any application services.
 *
 * @/return void
 */
//public function boot()
//{
    // Override the email notification for verifying email
    //VerifyEmail::toMailUsing(function ($notifiable){        $verifyUrl = URL::temporarySignedRoute(
            //'verification.verify',
           // Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
           // ['id' => $notifiable->getKey()]
       // );        return new EmailVerification($verifyUrl, $notifiable);    });
//}
}
