<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait GenericDB
{
    public static function caseInsensitiveSearch(Builder $builder, $col_name, $search_string): Builder
    {
        $search_string = strtolower($search_string);
        if (config('database.default') == 'pgsql') {
            return $builder->where($col_name, 'ilike', "%" . $search_string . "%");
        }
        return $builder->whereRaw("LOWER (`{$col_name}`) LIKE %{$search_string}%");
    }
}
