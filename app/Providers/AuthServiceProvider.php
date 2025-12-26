<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //                             key
        foreach (config('abilites') as $code => $label) {
            //                                          الموجود ضمن الابيلتي
            Gate::define($code, function ($user) use ($code) {
                return $user->hasAbility($code);
            });
        }
    }
}
