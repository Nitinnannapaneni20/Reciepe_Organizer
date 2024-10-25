<?php

use Illuminate\Database\Eloquent\Builder;

if (!function_exists('applySorting')) {
    function applySorting(Builder $query, $column = 'id', $order = 'asc')
    {
        return $query->orderBy($column, $order);
    }
}
