@extends('layout')
@section('content')
    <h1>Update Task!</h1>
    <form action="{{route('tasks.update', $task->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="task-project">Project</label>
            <select name="project_id" class="form-control" required id="task-project">
                <option value="" disabled selected>Please select a project</option>
                @foreach($projects as $project)
                    <option value="{{$project->id}}">{{$project->title}}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">

            <label for="task-name-input">Task name</label>
            <input type="text" class="form-control"
                   id="task-name-input" required
                   name="name"
                   placeholder="Enter task name" value="{{$task->name}}">

        </div>
        <div class="form-group">
            <label for="task-priority-input">Priority</label>
            <input type="number" class="form-control"
                   name="priority"
                   id="task-priority-input" placeholder="Task priority"
                   value="{{$task->priority}}" min="0">
        </div>

        <button type="submit" class="btn btn-primary">Save task</button>
    </form>
@endsection
