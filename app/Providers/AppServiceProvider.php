<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Session;
use App\Cart;
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
          Schema::defaultStringLength(191);
          view()->composer('*',function($view){
               if(Session ('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                // $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
                $cart=Session ('cart');
                $cart=response()->json(['cart'=>$cart]);
                $view->with(['cart'=>$cart]);

            }
         });
    }
}
