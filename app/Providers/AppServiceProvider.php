<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Schema;
>>>>>>> d1e50b9d9245bd216fdd71d4c74cd228546db4d6

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
<<<<<<< HEAD
     */
    public function register(): void
=======
     *
     * @return void
     */
    public function register()
>>>>>>> d1e50b9d9245bd216fdd71d4c74cd228546db4d6
    {
        //
    }

    /**
     * Bootstrap any application services.
<<<<<<< HEAD
     */
    public function boot(): void
    {
        //
=======
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
>>>>>>> d1e50b9d9245bd216fdd71d4c74cd228546db4d6
    }
}
