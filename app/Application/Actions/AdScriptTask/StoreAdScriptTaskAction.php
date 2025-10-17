<?php

namespace App\Application\Actions\AdScriptTask;

use App\Jobs\N8N\DispatchAdScriptToN8n;
use App\Services\AdScriptTaskService;

class StoreAdScriptTaskAction
{
    public function __construct(private readonly AdScriptTaskService $service) {}

    public function execute(array $data): array
    {
        $task = $this->service->create($data);

        /// dispatch job to n8n
        DispatchAdScriptToN8n::dispatch($task->id);

        return [
            'id' => $task->id,
            'status' => $task->status->value,
        ];
    }
}
