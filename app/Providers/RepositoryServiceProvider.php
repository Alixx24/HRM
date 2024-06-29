<?php

namespace App\Providers;

use App\Repositories\EmployeeRepo;
use App\Repositories\IEmployeeRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IEmployeeRepo::class, EmployeeRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
