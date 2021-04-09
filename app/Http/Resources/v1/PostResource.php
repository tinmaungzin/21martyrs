<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class PostResource extends ResourceCollection
{

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => $this->collection->transform(function ($post) {
                if (Auth::guard('api')->check()) return $post;
                unset($post->admin_id, $post->created_at, $post->updated_at);
                if (!is_null($post->state)) {
                    unset($post->state->created_at, $post->state->updated_at);
                }
                return $post;
            }),
            'links' => [
                'self' => "link-value"
            ]
        ];
    }

    public function with($request): array
    {
        return [
            'meta' => [
                'version' => '1'
            ]
        ];
    }
}
