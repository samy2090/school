<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Interfaces\TeacherRepositoryInterface', 'App\Repositories\TeacherRepository');
    
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
