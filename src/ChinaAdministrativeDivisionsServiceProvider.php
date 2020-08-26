<?php

declare(strict_types=1);

namespace Zing\ChinaAdministrativeDivisions;

use Illuminate\Support\ServiceProvider;

class ChinaAdministrativeDivisionsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    $this->getConfigPath() => config_path('china-administrative-divisions.php'),
                ],
                'config'
            );
        }

        $this->app->singleton('china-administrative-divisions', ChinaAdministrativeDivisionsManager::class);
    }

    public function register(): void
    {
        $this->mergeConfigFrom($this->getConfigPath(), 'china-administrative-divisions');
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '../migrations');
        }
    }

    protected function getConfigPath(): string
    {
        return __DIR__ . '/../config/china-administrative-divisions.php';
    }
}
