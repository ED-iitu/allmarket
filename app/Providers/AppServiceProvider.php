<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;

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
        view()->composer('*', function ($view) {
            $count = 0;
            $prices = 0;

            $countCartItems = Session::get('cart');
            if ($countCartItems != false) {
                foreach ($countCartItems as $item) {
                    $count += $item['quantity'];
                    $prices += (int)$item['price'] * $item['quantity'];
                }
            }
            $view->with('count', $count)->with('prices', $prices);
        });
    }
}
