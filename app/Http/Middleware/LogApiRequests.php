<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogApiRequests
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $service = app(\App\Services\LogApiRequestsService::class);

        $service->create([
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            'user_id' => optional($request->user())->id,
            'headers' => $request->headers->all(),
            'body' => $request->except(['password', 'token']),
            'response_status' => $response->getStatusCode(),
            'response_body' => $response->getContent(),
        ]);

        return $response;
    }
}
