<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\Dao\TaskDaoInterface', 'App\Dao\TaskDao'); 
        $this->app->bind('App\Contracts\Services\TaskServiceInterface', 'App\Services\TaskService');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
