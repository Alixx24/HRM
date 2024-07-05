<?php

namespace App\Providers;

use App\Repositories\AuthRepo;
use App\Repositories\AuthRepoInterface;
use App\Repositories\EmployeeRepo;
use App\Repositories\EmployeeRepoInterface;
use App\Repositories\JobHisRepoInterface;
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
        $this->app->bind(JobHisRepoInterface::class, JobHistoryRepo::class);
        $this->app->bind(AuthRepoInterface::class, AuthRepo::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
