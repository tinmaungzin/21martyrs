<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\PostResource;
use App\Modules\Post\Validators;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $repository;

    public function __construct(PostRepository $postRepository)
    {
        $this->repository = $postRepository;
    }

    //

    /**
     * @throws \Exception
     */
    public function get(Request $request)
    {
        $validator = Validators::fetchValidator($request->all());
        if ($validator->fails()) {
            return response([
                'errors' => $validator->errors()->messages()
            ], 401);
        }
        $filter = [
            'name' => $request->input('name'),
            'state_id' => $request->input('state_id'),
            'status' => $request->input('status')
        ];
        $posts = $this->repository->filter($filter, $request->input('offset'), ['state'])->paginate()->withPath($request->path());
        return new PostResource($posts);
    }
}
