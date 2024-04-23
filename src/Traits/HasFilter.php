<?php

namespace Akhmads\Hyco\Traits;

use Illuminate\Support\Facades\DB;

trait HasFilter
{
    public function scopeTableOrder($query, $data)
    {
        $column = array_key_first($data);
        $direction = $data[$column] ?? '';
        if ( ! empty($direction)) {
            return $query->orderBy($column, $direction);
        }

        return $query;
    }

    public function scopeTableLike($query, $column, $keyword)
    {
        if ( ! empty($keyword)) {
            $keyword = strtolower($keyword);
            return $query->where(DB::raw("LOWER($column)"), "like", "%".$keyword."%");
        }

        return $query;
    }

    public function scopeTableOrLike($query, $column, $keyword)
    {
        if ( ! empty($keyword)) {
            $keyword = strtolower($keyword);
            return $query->orWhere(DB::raw("LOWER($column)"), "like", "%".$keyword."%");
        }

        return $query;
    }

    public function scopeActive($query)
    {
        return $query->where($this->getTable() . '.status', 'active');
    }

    public function scopeWhereDateBetween($query, $startDate, $endDate)
    {
        return $query->whereBetween($this->getTable() . '.' . $this->getCreatedAtColumn(), [$startDate, $endDate]);
    }

    public function scopeWhereDateIs($query, $date)
    {
        return $query->where($this->getTable() . '.' . $this->getCreatedAtColumn(), $date);
    }
}
