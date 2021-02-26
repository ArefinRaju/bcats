<?php


namespace Helper\Repo;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(UserRepository::class, UserRepository::class);
        $this->app->bind(AccountRepository::class, AccountRepository::class);
        $this->app->bind(ProjectRepository::class, ProjectRepository::class);
        $this->app->bind(ProjectUserRepository::class, ProjectUserRepository::class);
        $this->app->bind(MaterialRepository::class, MaterialRepository::class);
        $this->app->bind(MaterialHistoryRepository::class, MaterialHistoryRepository::class);
        $this->app->bind(PayeeRepository::class, PayeeRepository::class);
    }
}