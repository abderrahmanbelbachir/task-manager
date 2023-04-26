@extends('layout')
@section('styles')
    <link rel="stylesheet" type="text/css" href="styles/task/index.css">
@endsection
@section('content')
    <div class="header">
        <h1>Tasks List</h1>
        <a class="btn btn-primary" href="{{route('tasks.create')}}">
            Create task!
        </a>
        <a class="btn btn-success" href="{{route('projects.index')}}">
            Manage Projects!
        </a>
    </div>
    <div class="header">
        <strong>Project : </strong>
        <select name="project_id" class="form-control">
            <option value="all" selected>All projects</option>
            @foreach($projects as $project)
                <option value="{{$project->id}}">{{$project->title}}</option>
            @endforeach
        </select>
    </div>
    <div id="sortable">
        @foreach($tasks as $task)
            <div class="item" data-id="{{$task->id}}"
                 data-name="{{$task->name}}">
                <div>
                    <strong>Project: </strong> {{$task->project->id}}
                </div>
                <div>
                    <strong>Task name: </strong> {{$task->name}}
                </div>
                <div>
                    <strong>Task Priority: </strong> {{$task->priority}}
                </div>
                <div class="actions">
                    <form method="GET" action="{{route('tasks.edit', ['task' => $task->id])}}">
                        <button class="btn btn-primary">
                            Edit Task
                        </button>
                    </form>

                    <form method="POST" action="{{route('tasks.destroy', ['task' => $task->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete Task</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script type="text/javascript" src="js/task/index.js" ></script>
@endsection
