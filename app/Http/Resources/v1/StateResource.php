<?php

namespace App\Http\Resources\v1;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

/**
 * @property string id
 * @property string name
 */
class StateResource extends ResourceCollection
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
            'data' => $this->collection->transform(function (State $state) {
                if (Auth::guard('api')->check()) {
                    return $state;
                }
                unset($state->created_at, $state->updated_at);
                return $state;
            }),
            "links" => [
                'self' => "link-value"
            ]
        ];
    }
}
