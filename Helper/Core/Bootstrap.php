<?php


namespace Helper\Core;


use Helper\Config\ConfigInit;
use Helper\Repo\RepositoryServiceProvider;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;

class Bootstrap
{
    public static function init(Application $app): Application
    {
        (new LoadEnvironmentVariables())->bootstrap($app); // Load Env file
        $app->register(RepositoryServiceProvider::class); // Load all required Repo
        ConfigInit::init(); // Initiate other config here
        return $app;
    }
}