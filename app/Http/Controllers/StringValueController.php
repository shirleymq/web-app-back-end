<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StringValueService;

class StringValueController extends Controller
{
    protected $stringValueService;

    public function __construct(StringValueService $stringValueService)
    {
        $this->stringValueService = $stringValueService;
    }

    public function getMaximunValueFunction(Request $request)
    {
        $data = $request->validate([
            'input' => 'required|string|min:1|max:100000|regex:/^[a-z]+$/'
        ]);

        $t = $request['input'];
        $maxValue = $this->stringValueService->calculateMaxValue($t);

        return response()->json(['data' => $maxValue]);
    }
}
