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

    /**
     * @throws Exception
     */
    public function filter(array $filter, $offset, array $relationships = [])
    {
        try {
            if (empty($filter)) {
                return $this->getAll();
            }
            $builder = Post::with($relationships)->name($filter['name'])->state($filter['state_id'])
                ->status($filter['status'])
                ->orderBy('created_at', 'desc');
            if (!is_null($offset)) {
                $builder = $builder->skip((int)$offset);
            }
            return $builder
                ->get();
        } catch (Exception $exception) {
            throw $exception;
        }
    }


    public function getAll()
    {

        return Post::all();
    }
}
