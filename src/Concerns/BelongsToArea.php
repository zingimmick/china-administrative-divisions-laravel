<?php

declare(strict_types=1);

namespace Zing\ChinaAdministrativeDivisions\Concerns;

use Illuminate\Contracts\Support\Arrayable;
use Zing\ChinaAdministrativeDivisions\Models\Area;

/**
 * @property-read \Zing\ChinaAdministrativeDivisions\Models\Area|null $auction
 *
 * @method static static|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder whereAreaCode($id)
 * @method static static|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder whereAreaCodeNot($id)
 */
trait BelongsToArea
{
    public function area()
    {
        return $this->belongsTo(Area::class, $this->getAreaCodeName(), 'code');
    }

    public function getAreaCodeName(): string
    {
        return 'area_code';
    }

    public function getAreaCode()
    {
        return $this->getAttribute($this->getAreaCodeName());
    }

    public function getQualifiedAreaCodeName()
    {
        return $this->qualifyColumn($this->getAreaCodeName());
    }

    /**
     * @param static|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder $query
     * @param mixed $code
     *
     * @return static|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function scopeWhereAreaCode($query, $code)
    {
        if (is_array($code) || $code instanceof Arrayable) {
            return $query->whereIn($this->getQualifiedAreaCodeName(), $code);
        }

        return $query->where($this->getQualifiedAreaCodeName(), '=', $code);
    }

    /**
     * @param static|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder $query
     * @param mixed $code
     *
     * @return static|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function scopeWhereAreaCodeNot($query, $code)
    {
        if (is_array($code) || $code instanceof Arrayable) {
            return $query->whereNotIn($this->getQualifiedAreaCodeName(), $code);
        }

        return $query->where($this->getQualifiedAreaCodeName(), '!=', $code);
    }
}
