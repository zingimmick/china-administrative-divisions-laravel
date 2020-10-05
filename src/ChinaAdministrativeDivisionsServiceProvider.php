<?php

declare(strict_types=1);

namespace Zing\ChinaAdministrativeDivisions;

use Illuminate\Support\ServiceProvider;
use Zing\ChinaAdministrativeDivisions\Console\InitCommand;

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
    }

    public function register(): void
    {
        $this->mergeConfigFrom($this->getConfigPath(), 'china-administrative-divisions');
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../migrations');
            $this->commands([InitCommand::class]);
        }
    }

    protected function getConfigPath(): string
    {
        return __DIR__ . '/../config/china-administrative-divisions.php';
    }
}
