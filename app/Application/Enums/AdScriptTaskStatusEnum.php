<?php

namespace App\Application\Enums;

enum AdScriptTaskStatusEnum: string
{
    use EnumHelpersTrait;

    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case FAILED = 'failed';
}
