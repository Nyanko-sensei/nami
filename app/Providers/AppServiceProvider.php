<?php

namespace App\Providers;

use App\Services\Scheduler\QuestionsScheduler;
use App\Services\Scheduler\QuestionsSchedulerInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(QuestionsSchedulerInterface::class, QuestionsScheduler::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
