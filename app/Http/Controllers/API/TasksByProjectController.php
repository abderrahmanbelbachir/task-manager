<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class TasksByProjectController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function __invoke($project): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $query = Task::orderBy('priority' , 'asc');
        if ($project !== 'all') {
            $query->where('project_id' , $project);
        }
        $tasks = $query->get();
        return view('includes.task_list')->with([
            'tasks' => $tasks
        ]);
    }


}
