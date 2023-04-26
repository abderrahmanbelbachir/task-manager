@extends('layout')
@section('content')
    <h1>Create project!</h1>
    <form action="{{route('projects.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control"
                   id="project-name-input" required
                   name="title"
                   placeholder="Enter project title">

        </div>

        <button type="submit" class="btn btn-primary">Save project</button>
    </form>

@endsection
