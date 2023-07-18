<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Recharge;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $control = Setting::first();
        $rechargeCount = Recharge::where('status', 2)->count();
        view()->share('control', $control);
        view()->share('rechargeCount', $rechargeCount);
    }
}
