<?php

declare(strict_types=1);

namespace Zing\ChinaAdministrativeDivisions\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool foo()
 * @mixin \Zing\ChinaAdministrativeDivisions\ChinaAdministrativeDivisionsManager
 */
class ChinaAdministrativeDivisions extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'china-administrative-divisions';
    }
}
