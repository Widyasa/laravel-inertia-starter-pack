<?php

namespace App\Providers;

use App\Interfaces\AuthInterface;
use App\Interfaces\DivisionInterface;
use App\Repositories\AuthRepository;
use App\Repositories\DivisionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryInterfaceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind( AuthInterface::class,  AuthRepository::class);
        $this->app->bind(  DivisionInterface::class, concrete: DivisionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
