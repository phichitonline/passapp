<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Setting;
use App\Models\Durable;
use App\Models\Repair;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('*',function($view) {
            $view->with('setting', Setting::where('id', '=', '1')->get());
            $view->with('count_users', User::count());
            $view->with('count_durable', Durable::where([
                ['durables.status','<>','9'],
                ['durables.status','<>','4']
            ])->count());
            $view->with('count_durable9', Durable::where('status', 9)->count());
            $view->with('count_durable4', Durable::where('status', 4)->count());
            $view->with('count_durable17', Durable::where('fasgrp', '=', '17')->count());
            $view->with('count_durable18', Durable::where('fasgrp', '=', '18')->count());
            $view->with('repair_status1', Repair::where('repair_status', '=', '1')->count());
            $view->with('repair_status2', Repair::where('repair_status', '=', '2')->count());
        });
    }
}
