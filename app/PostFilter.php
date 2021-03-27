<?php

namespace App;

class PostFilter extends QueryFilter
{
    public function name($name)
    {
        return $this->builder->where('name','like', '%' . $name . '%');
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
