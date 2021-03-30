<?php

namespace App;

use App\Models\Traits\GenericDB;
use App\Utility\StringUtility;

class PostFilter extends QueryFilter
{
    use GenericDB;

    public function name($name): \Illuminate\Database\Eloquent\Builder
    {
//        return $this->builder->where('name', 'like', '%' . $name . '%');
        if (StringUtility::isEmpty($name)) {
            return $this->builder;
        }
        return self::caseInsensitiveSearch($this->builder, 'name', $name);
    }

    public function state($state)
    {
        if (StringUtility::isEmpty($state)) {
            return $this->builder;
        }
        return $this->builder->where('state_id', $state);
    }

    public function status($status)
    {
        if (StringUtility::isEmpty($status)) {
            return $this->builder;
        }
        return $this->builder->where('status', strtolower($status));
    }
}
