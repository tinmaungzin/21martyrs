<?php


namespace App\Repositories;


use App\Models\State;

class StateRepository implements BaseRepository
{

    public function getAll()
    {
        return State::all();
    }

    public function filter(array $filter, $offset, array $relationships = [])
    {
        return State::all();
    }
}
