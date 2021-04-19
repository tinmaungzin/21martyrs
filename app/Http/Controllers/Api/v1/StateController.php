<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\StateResource;
use App\Repositories\StateRepository;
use Illuminate\Http\Request;

class StateController extends Controller
{
    protected $repository;

    public function __construct(StateRepository $repository)
    {
        $this->repository = $repository;
    }

    //

    public function get(): StateResource
    {
        $states = $this->repository->getAll();
        return new StateResource($states);
    }
}
