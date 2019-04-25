<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use TCG\Voyager\Facades\Voyager;
use App\Actions\Status;

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
        Voyager::addAction(Status::class);
    }
}
