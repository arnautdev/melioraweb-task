<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseApiController extends Controller
{
    public function response($data, $status = 200)
    {
        return response()->json($data, $status);
    }
}
