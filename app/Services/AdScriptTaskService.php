<?php

namespace App\Services;

use App\Application\Enums\AdScriptTaskStatusEnum;
use App\Events\AdScriptTaskUpdated;
use App\Models\AdScriptTask;
use Illuminate\Database\QueryException;

class AdScriptTaskService extends BaseService
{

    public function update(AdScriptTask $task, $data = []): ?AdScriptTask
    {
        try {
            $data['status'] = AdScriptTaskStatusEnum::COMPLETED;

            $task->fill($data);

            if (!$task->save()) {
                throw new \RuntimeException('Error while updating task.');
            }

            event(new AdScriptTaskUpdated($task));

            return $task->fresh();
        } catch (QueryException $exception) {
            $this->logDbError($exception);

            throw new \RuntimeException('Database error while creating task.');
        }
    }

    public function create($data = []): ?AdScriptTask
    {
        try {
            $task = new AdScriptTask();
            $task->fill($data);

            if (!$task->save()) {
                throw new \RuntimeException('Error while creating task.');
            }

            return $task->fresh();
        } catch (QueryException $exception) {
            $this->logDbError($exception);

            throw new \RuntimeException('Database error while creating task.');
        }
    }
}
