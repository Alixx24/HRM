<?php

namespace App\Providers;

use App\Repositories\EmployeeRepo;
use App\Repositories\EmployeeRepoInterface;
use App\Repositories\JobHistoryRepo;
use App\Repositories\JobHistoryRepoInterface;
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
        $this->app->bind(JobHistoryRepoInterface::class, JobHistoryRepo::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
