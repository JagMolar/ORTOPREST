<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Beneficiary;
use App\User;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
//        View::share('key', 'value');
        $alertFund = Carbon::now();
        $alertEnd = Beneficiary::where('final_lapse', '<', $alertFund)->get();
//        View::share('alertEnd', $alertEnd);
        $alertEndCount = count($alertEnd);
        View()->share('alertEndCount', $alertEndCount);
//        $role = User::where('role',"=",'Admin')->get();
//        View()->share('role', $role);
//        
//        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
