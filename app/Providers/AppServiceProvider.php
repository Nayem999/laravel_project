<?php

namespace App\Providers;

use App\Friend;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;
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
        // view()->composer('layouts.list', function($view){
        //     $view->with('user',Auth::user());
        // });
        view()->composer('layouts.list', function($view){
            $add=Friend::where('user_id',Auth::id())->orWhere('add_friend',Auth::id())->get();
            $user=User::all();
            $profile=Profile::all();
            $view->with('add',$add)->with('user',$user)->with('profile',$profile);
        });

        view()->composer('layouts.master', function($view){
            $fndcount=Friend::where('add_friend',Auth::id())->get();
            $view->with('fndcount',$fndcount);
        });

        Schema::defaultStringLength(191);
    }
}
