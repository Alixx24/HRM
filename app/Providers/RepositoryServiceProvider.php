<?php

namespace App\Providers;

use App\Repositories\EmployeeRepo;
use App\Repositories\EmployeeRepoInterface;
use App\Repositories\JobRepo;
use App\Repositories\JobRepoInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeRepoInterface::class, EmployeeRepo::class);
        $this->app->bind(JobRepoInterface::class, JobRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
