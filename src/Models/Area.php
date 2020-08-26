<?php

declare(strict_types=1);

namespace Zing\ChinaAdministrativeDivisions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Zing\ChinaAdministrativeDivisions\Concerns\BelongsToCity;
use Zing\ChinaAdministrativeDivisions\Concerns\BelongsToProvince;

class Area extends Model
{
    use BelongsToProvince;
    use BelongsToCity;

    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
        'province_code',
        'city_code',
    ];

    public function streets(): HasMany
    {
        return $this->hasMany(Street::class, 'area_code', 'code');
    }

    public function villages(): HasMany
    {
        return $this->hasMany(Village::class, 'area_code', 'code');
    }
}
