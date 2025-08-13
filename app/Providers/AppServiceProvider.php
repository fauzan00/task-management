<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\Workspace;
use App\Policies\TaskPolicy;
use App\Policies\WorkspacePolicy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Workspace::class => WorkspacePolicy::class,
        Task::class => TaskPolicy::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        //   $this->registerPolicies();
    }
}
