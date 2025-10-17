<?php

namespace App\Services;

use App\Models\LogApiRequests;
use Illuminate\Database\QueryException;

class LogApiRequestsService extends BaseService
{
    public function create(array $data = []): ?LogApiRequests
    {
        try {
            $log = new LogApiRequests();
            $log->fill($data);

            if (!$log->save()) {
                throw new \RuntimeException('Error while creating log.');
            }

            return $log->fresh();
        } catch (QueryException $exception) {
            $this->logDbError($exception);

            throw new \RuntimeException('Database error while creating log.');
        }
    }
}
