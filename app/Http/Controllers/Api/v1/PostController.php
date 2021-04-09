<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\PostResource;
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
    public function get(Request $request): PostResource
    {
        $filter = [
            'name' => $request->input('name'),
            'state_id' => $request->input('state_id'),
            'status' => $request->input('status')
        ];

        $posts = $this->repository->filter($filter)->paginate()->withPath($request->path());
        return new PostResource($posts);
    }
}
