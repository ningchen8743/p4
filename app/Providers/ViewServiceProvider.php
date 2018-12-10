<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    public function boot()
    {
        view()->composer('layouts.master', function ($view) {
            $user = request()->user();
            $view->with('user', $user);
        });
    }

    public function register()
    {
        //
    }
}