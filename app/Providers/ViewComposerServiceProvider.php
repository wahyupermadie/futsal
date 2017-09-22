<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Composers\HeaderComposer;
use View;
use App\Futsal;
use Auth;
class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $futsal='';
        view()->composer(['customer.index','customer.fieldDashboard','customer.fieldEdit','customer.scheduleDashboard','customer.scheduleOffline','customer.schedulePending','customer.scheduleSuccess','customer.viewSchedule','customer.reportDashboard','customer.reportDetail','customer.customerProfile'], function ($view) use($futsal) {
            $futsal = (Futsal::select('name')->where('id', '=', Auth::user()->futsal_id))->first();
            $view->with('futsal', $futsal);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}