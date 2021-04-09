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

    public function filter(array $filter, array $relationships = [])
    {
        try {
            if (empty($filter)) {
                return $this->getAll();
            }
            return Post::with($relationships)->name($filter['name'])->state($filter['state_id'])
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
