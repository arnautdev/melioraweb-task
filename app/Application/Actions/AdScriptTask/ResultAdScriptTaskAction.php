<?php

namespace App\Application\Actions\AdScriptTask;

use App\Jobs\N8N\DispatchAdScriptToN8n;
use App\Models\AdScriptTask;
use App\Services\AdScriptTaskService;

class ResultAdScriptTaskAction
{
    public function __construct(private readonly AdScriptTaskService $service) {}

    public function execute(array $data): array
    {
        $task = AdScriptTask::find($data['task_id']);
        $task = $this->service->update($task, $data);

        return [
            'id' => $task->id,
            'status' => $task->status->value,
        ];
    }
}
