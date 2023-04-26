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
