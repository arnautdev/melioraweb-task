<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperLogApiRequests
 */
class LogApiRequests extends BaseModel
{
    protected $fillable = [
        'method',
        'url',
        'ip',
        'user_id',
        'headers',
        'body',
        'response_status',
        'response_body',
    ];

    protected $casts = [
        'headers' => 'array',
        'body' => 'array',
        'response_body' => 'array',
    ];
}
