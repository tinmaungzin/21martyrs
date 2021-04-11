<?php

namespace App\Modules\Post;

use App\Utility\Constants;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Validators
{
    static function fetchValidator(array $data, array $additionalRules = []): \Illuminate\Contracts\Validation\Validator
    {
        $rules = collect([
            'name' => 'string|nullable',
            'status' => ['nullable', Rule::in(Constants::POSTS_STATUS)]
        ]);
        $final_rules = $rules->merge($additionalRules)->all();
        return Validator::make($data, $final_rules);
    }
}
