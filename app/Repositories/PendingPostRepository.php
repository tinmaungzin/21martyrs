<?php


namespace App\Repositories;


use App\Models\PendingPost;
use BadMethodCallException;

class PendingPostRepository implements BaseRepository
{

    public function getAll()
    {
        return PendingPost::all();
    }

    public function filter(array $filter, $offset, array $relationships = [])
    {
//         TODO: Implement filter() method.
        throw new BadMethodCallException("Method unimplemented");
    }
}
