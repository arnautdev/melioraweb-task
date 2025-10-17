<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseRequest;

class StoreAdScriptTaskRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'reference_script' => 'required|string',
            'outcome_description' => 'required|string',
        ];
    }
}
