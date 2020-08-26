<?php

declare(strict_types=1);

namespace Zing\ChinaAdministrativeDivisions\Tests;

use Zing\ChinaAdministrativeDivisions\Models\Area;
use Zing\ChinaAdministrativeDivisions\Models\City;
use Zing\ChinaAdministrativeDivisions\Models\Province;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
    }

    protected function getEnvironmentSetUp($app): void
    {
        config([
            'database.default' => 'testing'
        ]);
    }

    public function testModel(): void
    {
        collect(json_decode(file_get_contents(__DIR__.'/../pca-code.json'),true))->each(function ($item){
            /** @var Province $province */
           $province=Province::query()->updateOrCreate([
               'code'=>$item['code']
           ],['name'=>$item['name']]) ;
            collect($item['children'])->each(function ($item)use ($province){

              $city=  $province->cities()->updateOrCreate([
                    'code'=>$item['code']
                ],['name'=>$item['name']]);

                collect($item['children'])->each(function ($item)use ($city){

                    $city->areas()->updateOrCreate([
                        'code'=>$item['code']
                    ],['name'=>$item['name'],'province_code'=>$city->province_code]);
                });
            });
        });
        dump(Area::query()->count());
    }
}
