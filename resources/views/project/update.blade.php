@extends('layout')

@section('content')
    <h1>Update Project!</h1>
    <form action="{{route('projects.update', $project->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project-name-input">Project title</label>
            <input type="text" class="form-control"
                   id="project-name-input" required
                   name="title"
                   placeholder="Enter project title" value="{{$project->title}}">
        </div>

        <button type="submit" class="btn btn-primary">Save project</button>
    </form>

@endsection
