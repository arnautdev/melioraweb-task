<?php

namespace App\Models;

use App\Application\Enums\AdScriptTaskStatusEnum;

/**
 * @mixin IdeHelperAdScriptTask
 */
class AdScriptTask extends BaseModel
{
    protected $fillable = [
        'reference_script',
        'outcome_description',
        'new_script',
        'analysis',
        'status',
        'error',
    ];


    protected $casts = [
        'status' => AdScriptTaskStatusEnum::class,
    ];
}
