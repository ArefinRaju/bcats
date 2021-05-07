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
        $this->app->bind(MaterialRepository::class, MaterialRepository::class);
        $this->app->bind(MaterialHistoryRepository::class, MaterialHistoryRepository::class);
        $this->app->bind(PayeeRepository::class, PayeeRepository::class);
        $this->app->bind(EMIRepository::class, EMIRepository::class);
        $this->app->bind(InvoiceRepository::class, InvoiceRepository::class);
        $this->app->bind(CategoryRepository::class, CategoryRepository::class);
        $this->app->bind(EmiUserRepository::class, EmiUserRepository::class);
    }
}