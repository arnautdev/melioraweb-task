<?php

namespace App\Services;

use Illuminate\Database\QueryException;

class BaseService
{
    public function logDbError(QueryException $exception, array $addons = []): void
    {
        \Log::error('DB error while processing', [
            'error' => $exception->getMessage(),
            'trace' => $exception->getTraceAsString(),
            ...$addons
        ]);
    }

    /**
     * @todo create standart CRUD implementation which wii be used in all services
     */
}
