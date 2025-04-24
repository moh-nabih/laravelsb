@extends('layouts.app')

@section('title', 'Tasks')


@section('content')
<div class="container mx-auto p-4">
    <h1>Tasks</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="javascript:void(0)" onclick="openTaskModal('/tasks/create')" class="m-3 btn btn-success">+ New Task</a>

    <div class="row">
        @foreach ($tasks as $task)
            <div class="m-3 p-3 border col-3 border-dark rounded">
                <h3 style="{{ $task->is_done ? 'text-decoration: line-through;' : '' }}" class="mx-3">
                    {{ $task->title }}
                </h3>
                <p class="mx-3" style="{{ $task->is_done ? 'text-decoration: line-through;' : '' }}">{{ $task->description }}</p>

                <form method="POST" action="{{ route('tasks.toggle', $task->id) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="m-3 btn {{$task->is_done ? 'btn-warning' : 'btn-success'}}">
                        {{ $task->is_done ? 'Undo:' : 'Complete:' }}
                        {{ $task->is_done ? 'Mark as Incomplete' : 'Mark as Done' }}
                    </button>
                </form>

                <a href="javascript:void(0)" onclick="openTaskModal('/tasks/{{$task->id}}/edit')"class="mx-3 btn btn-info">Edit</a>

                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" class="m-3 btn btn-danger">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="confirmDelete('{{ route('tasks.destroy', $task->id) }}')" class="btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
        </div>
    </div>

    <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="taskModalLabel">Task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="taskModalBody">
            </div>
        </div>
        </div>
    </div>
@endsection
