<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $tasks = Task::orderBy('priority' , 'asc')->get();

        $projects = Project::all();

        return view('task.index')->with([
            'tasks' => $tasks,
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $projects = Project::all();

        return view('task.create')->with([
            'projects' => $projects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateTaskRequest $request
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function store(CreateTaskRequest $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        Task::create($request->except('_token'));

        return redirect('/tasks')->with('message', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function show(int $id): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $task = Task::findOrFail($id);

        return view('task.show')->with([
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function edit(int $id): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $task = Task::findOrFail($id);

        return view('task.update')->with([
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTaskRequest $request
     * @param int $id
     * @return Application|\Illuminate\Foundation\Application|Redirector|RedirectResponse
     */
    public function update(UpdateTaskRequest $request, int $id): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        Task::where('id' , $id)->update($request->except('_token', '_method'));

        return redirect('/tasks')->with('message', 'Task updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|\Illuminate\Foundation\Application|Redirector|RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        Task::where('id', $id)->delete();

        return redirect('/tasks')->with('message', 'Task deleted successfully!');

    }
}
