<?php

declare(strict_types=1);

namespace Zing\ChinaAdministrativeDivisions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Zing\ChinaAdministrativeDivisions\Concerns\BelongsToArea;
use Zing\ChinaAdministrativeDivisions\Concerns\BelongsToCity;
use Zing\ChinaAdministrativeDivisions\Concerns\BelongsToProvince;

class Street extends Model
{
    use BelongsToProvince;
    use BelongsToCity;
    use BelongsToArea;
    public $timestamps=false;
    protected $fillable = [
        'code',
        'name',
        'province_code',
        'city_code',
        'area_code'
    ];
    public function villages(): HasMany
    {
        return $this->hasMany(Village::class, 'street_code', 'code');
    }
}
