<?php

namespace AVXMAN\CRM;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class CRMServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @param Filesystem $filesystem
     * @return void info
     */
    public function boot(Filesystem $filesystem){
        $this->publishes([
            __DIR__.'/../database/migrations/create_route_table.php.stub' => $this->getMigrationFileName($filesystem),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../config/crm.php' => $this->getConfigFileName($filesystem),
        ], 'config');
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
//        $this->mergeConfigFrom(
//            $this->app->configPath().DIRECTORY_SEPARATOR.'crm.php', 'crm'
//        );
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His');

        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path.'*_create_route_table.php');
            })->push($this->app->databasePath()."/migrations/{$timestamp}_create_route_table.php")
            ->first();
    }

    /**
     * Returns existing config file if found, else uses the current.
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getConfigFileName(Filesystem $filesystem): string
    {
        return Collection::make($this->app->configPath().DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path.'crm.php');
            })->push($this->app->configPath()."/crm.php")
            ->first();
    }

}
