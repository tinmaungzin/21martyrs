<?php

namespace App;

use App\Models\Traits\GenericDB;

class PostFilter extends QueryFilter
{
    use GenericDB;

    public function name($name): \Illuminate\Database\Eloquent\Builder
    {
//        return $this->builder->where('name', 'like', '%' . $name . '%');
        return self::caseInsensitiveSearch($this->builder, 'name', $name);
    }

    public function state($state)
    {
        return $this->builder->where('state_id', $state);

    }

    public function status($status)
    {
        return $this->builder->where('status', $status);
    }
}
