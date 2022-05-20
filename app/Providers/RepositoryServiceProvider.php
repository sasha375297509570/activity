<?php

namespace App\Providers;

use App\Repositories\DbActivityRepository;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ActivityRepositoryInterface::class, 
            DbActivityRepository::class
        );
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
