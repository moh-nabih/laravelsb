@extends('layouts.app')

@section('title', 'Create Task')


@section('content')
<div class="container mx-auto p-4">
    <h1>Create a New Task</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div class="input-group mb-3">
            <div class="input-group-append">
                <label class="input-group-text">Title:</label>

            </div>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Description:</span>
            </div>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success m-2"">Save Task</button>
    </form>

    <a href="{{ route('tasks.index') }}" class="btn btn-warning m-2">← Back to Tasks</a>
</div>
@endsection
