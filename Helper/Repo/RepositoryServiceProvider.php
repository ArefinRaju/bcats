<?php


namespace Helper\Repo;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(UserRepository::class, UserRepository::class);
    }
}