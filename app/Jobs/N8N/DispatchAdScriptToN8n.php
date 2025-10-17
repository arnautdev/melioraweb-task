<?php

namespace App\Jobs\N8N;

use App\Models\AdScriptTask;
use App\Services\N8nApiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\RequestException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DispatchAdScriptToN8n implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $timeout = 25;

    public function __construct(public int $taskId) {}

    /**
     * @throws RequestException
     */
    public function handle(N8nApiService $service): void
    {
        /// will be better getting from repository, but for now get it directly from db
        $task = AdScriptTask::find($this->taskId);

        $service->aiAdRefactor($task);
    }
}
