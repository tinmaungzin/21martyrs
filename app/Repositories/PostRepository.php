<?php


namespace App\Repositories;


use App\Models\Post;
use App\Models\Traits\GenericDB;
use App\Utility\StringUtility;
use Exception;
use Illuminate\Support\Collection;

class PostRepository implements BaseRepository
{
    use GenericDB;

    public function filter(array $filter)
    {
        try {
            if (empty($filter)) {
                return $this->getAll();
            }
            return Post::name($filter['name'])->state($filter['state_id'])
                ->status($filter['status'])->get();
        } catch (Exception $exception) {
            return Collection::empty();
        }
    }


    public function getAll()
    {

        return Post::all();
    }
}
