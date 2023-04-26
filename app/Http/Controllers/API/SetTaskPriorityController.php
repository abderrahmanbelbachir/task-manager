<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class SetTaskPriorityController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @return JsonResponse
     */
    public function __invoke($task, $priority)
    {
        Task::where('id' , $task)->update(['priority' => $priority]);
        return response()->json(['message' => 'priority set successfully!']);
    }


}
