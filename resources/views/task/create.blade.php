@extends('layout')

@section('content')
    <h1>Create Task!</h1>
    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="task-name-input">Project</label>
            <select name="project_id" class="form-control" required>
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
                   placeholder="Enter task name">

        </div>
        <div class="form-group">
            <label for="task-priority-input">Priority</label>
            <input type="number" class="form-control"
                   name="priority"
                   id="task-priority-input" placeholder="Task priority" value="0" min="0">
        </div>

        <button type="submit" class="btn btn-primary">Save task</button>
    </form>

@endsection
