<?php

namespace App\Http\Controllers\Api;

use App\Application\Actions\AdScriptTask\ResultAdScriptTaskAction;
use App\Application\Actions\AdScriptTask\StoreAdScriptTaskAction;
use App\Http\Requests\Api\ResultAdScriptTaskRequest;
use App\Http\Requests\Api\StoreAdScriptTaskRequest;
use Illuminate\Http\JsonResponse;

class AdScriptTaskController extends BaseApiController
{
    public function store(StoreAdScriptTaskRequest $request, StoreAdScriptTaskAction $action): JsonResponse
    {
        return $this->response($action->execute($request->validated()));
    }

    public function result(ResultAdScriptTaskRequest $request, ResultAdScriptTaskAction $action): JsonResponse
    {
        return $this->response($action->execute($request->validated()));
    }
}
