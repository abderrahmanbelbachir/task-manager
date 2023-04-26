<?php

namespace App\Http\Controllers;


use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {

        $projects = Project::all();

        return view('project.index')->with([
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
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateProjectRequest $request
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function store(CreateProjectRequest $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        Project::create($request->except('_token'));

        return redirect('/projects')->with('message', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function show(int $id): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $project = Project::findOrFail($id);

        return view('project.show')->with([
            'project' => $project
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
        $project = Project::findOrFail($id);

        return view('project.update')->with([
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProjectRequest $request
     * @param int $id
     * @return Application|\Illuminate\Foundation\Application|Redirector|RedirectResponse
     */
    public function update(UpdateProjectRequest $request, int $id): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        Project::where('id' , $id)->update($request->except('_token', '_method'));

        return redirect('/projects')->with('message', 'Project updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|\Illuminate\Foundation\Application|Redirector|RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        Project::where('id', $id)->delete();

        return redirect('/projects')->with('message', 'Project deleted successfully!');

    }
}
