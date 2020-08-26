<?php

declare(strict_types=1);

namespace Zing\ChinaAdministrativeDivisions\Models;

use Illuminate\Database\Eloquent\Model;
use Zing\ChinaAdministrativeDivisions\Concerns\BelongsToArea;
use Zing\ChinaAdministrativeDivisions\Concerns\BelongsToCity;
use Zing\ChinaAdministrativeDivisions\Concerns\BelongsToProvince;
use Zing\ChinaAdministrativeDivisions\Concerns\BelongsToStreet;

class Village extends Model
{
    use BelongsToProvince;
    use BelongsToCity;
    use BelongsToArea;
    use BelongsToStreet;

    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
        'province_code',
        'city_code',
        'area_code',
        'street_code',
    ];
}
