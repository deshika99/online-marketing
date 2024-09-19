<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Models\Aff_Customer;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('*', function ($view) {
            $affiliateId = Session::get('customer_id');
            $affiliate = $affiliateId ? Aff_Customer::find($affiliateId) : null;
            $affiliateName = $affiliate ? $affiliate->name : 'Guest';
            
            $view->with(compact('affiliateName', 'affiliateId'));
        });
    }

}