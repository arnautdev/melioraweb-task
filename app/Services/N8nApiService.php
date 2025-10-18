<?php

namespace App\Services;

use App\Models\AdScriptTask;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class N8nApiService
{
    /**
     * @throws RequestException
     */
    public function aiAdRefactor(AdScriptTask $task): void
    {
        $payload = [
            'task_id' => $task->id,
            'reference_script' => $task->reference_script,
            'outcome_description' => $task->outcome_description,
            'callback_url' => route('api.ad-scripts.result', $task->id)
        ];

        $webhookUrl = rtrim(config('services.n8n.base_url'), '/')
            . '/' . ltrim(config('services.n8n.webhook_path'), '/');

        $token = request()->user()->createToken('n8n-webhook')->plainTextToken;
        Http::asJson()
            ->timeout((int)config('http.timeout', 20))
            ->retry((int)config('http.retries', 2), 500)
            ->withHeaders([
                'Authorization' => "Bearer {$token}",
            ])
            ->post($webhookUrl, $payload)
            ->throw();
    }

}
