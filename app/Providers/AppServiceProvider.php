<?php

namespace App\Providers;

use App\Contracts\GithubUserRepo;
use App\Repos\GithubUserRepoHttpImpl;
use App\Services\GithubUserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GithubUserRepo::class, GithubUserRepoHttpImpl::class);
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
