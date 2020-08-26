<?php

declare(strict_types=1);

namespace Zing\ChinaAdministrativeDivisions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'province_code', 'code');
    }

    public function areas(): HasMany
    {
        return $this->hasMany(Area::class, 'province_code', 'code');
    }

    public function streets(): HasMany
    {
        return $this->hasMany(Street::class, 'province_code', 'code');
    }

    public function villages(): HasMany
    {
        return $this->hasMany(Village::class, 'province_code', 'code');
    }
}
