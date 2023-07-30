<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ActiveUser;
use App\Observers\ActiveUserObserver;

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
        ActiveUser::observe(ActiveUserObserver::class);
    }
}
