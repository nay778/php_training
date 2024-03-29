<?php

namespace App\Providers;

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
        // Dao Registration  
        $this->app->bind('App\Contracts\Dao\Student\StudentDaoInterface', 'App\Dao\Student\StudentDao'); 
        $this->app->bind('App\Contracts\Dao\Major\MajorDaoInterface', 'App\Dao\Major\MajorDao'); 
        
        // Business logic registration
        $this->app->bind('App\Contracts\Services\Student\StudentServiceInterface', 'App\Services\Student\StudentService');
        $this->app->bind('App\Contracts\Services\Major\MajorServiceInterface', 'App\Services\Major\MajorService');
    
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
