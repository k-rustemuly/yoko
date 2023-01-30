<?php

namespace App\Http\Controllers;

use App\Http\Requests\MergeRequest;
use App\Modules\Json\MergeJsonService;

class MergeJsonController extends Controller
{
    public function merge(MergeRequest $request, MergeJsonService $service)
    {
        return $service->merge($request->validated());
    }
}
