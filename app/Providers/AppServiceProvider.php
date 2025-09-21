<?php

namespace App\Providers;

use App\Models\Project;
use App\Observers\ProjectObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        \App\Models\Project::class => \App\Policies\ProjectPolicy::class,
        \App\Models\Task::class => \App\Policies\TaskPolicy::class,
         \App\Models\Label::class => \App\Policies\LabelPolicy::class,
    ];

    /**
     * Register any application services.
     */


    /**
     * Bootstrap any application services.
     */
}
