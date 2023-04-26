@extends('layout')
@section('styles')
    <link rel="stylesheet" href="styles/project/index.css"  />
@endsection
@section('content')
    <div class="header">
        <h1>Projects list!</h1>
        <a class="btn btn-primary" href="{{route('projects.create')}}">
            Create project!
        </a>
        <a class="btn btn-success" href="{{route('tasks.index')}}">
            Manage Tasks!
        </a>
    </div>
    <div id="sortable">
        @foreach($projects as $project)
            <div class="item" data-id="{{$project->id}}">
                <div>
                    <strong>Project Title: </strong> {{$project->title}}
                </div>

                <div class="actions">
                    <form method="GET" action="{{route('projects.edit', ['project' => $project->id])}}">
                        <button class="btn btn-primary">
                            Edit project
                        </button>
                    </form>

                    <form method="POST" action="{{route('projects.destroy', ['project' => $project->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete Project</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection
