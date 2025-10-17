<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseRequest;

class ResultAdScriptTaskRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'task_id' => 'required|integer|exists:ad_script_tasks,id',
            'new_script' => 'nullable|string',
            'analysis' => 'nullable|string',
            'error' => 'sometimes|string',
        ];
    }
}
