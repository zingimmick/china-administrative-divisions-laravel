<?php

declare(strict_types=1);

namespace Zing\ChinaAdministrativeDivisions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Zing\ChinaAdministrativeDivisions\Concerns\BelongsToProvince;

class City extends Model
{
    use BelongsToProvince;

    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
        'province_code',
    ];

    public function areas(): HasMany
    {
        return $this->hasMany(Area::class, 'city_code', 'code');
    }

    public function streets(): HasMany
    {
        return $this->hasMany(Street::class, 'city_code', 'code');
    }

    public function villages(): HasMany
    {
        return $this->hasMany(Village::class, 'city_code', 'code');
    }
}
