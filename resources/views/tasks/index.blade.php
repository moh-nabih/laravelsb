<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
</head>
<body>
    <h1>Tasks</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('tasks.create') }}">+ New Task</a>

    <ul>
        @foreach ($tasks as $task)
            <div style="margin-bottom: 15px;">
                <h3 style="{{ $task->is_done ? 'text-decoration: line-through;' : '' }}">
                    {{ $task->title }}
                </h3>
                <p>{{ $task->description }}</p>

                <form method="POST" action="{{ route('tasks.toggle', $task->id) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit">
                        {{ $task->is_done ? 'Mark as Incomplete' : 'Mark as Done' }}
                    </button>
                </form>

                <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>

                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this task?')">Delete</button>
                </form>
            </div>
        @endforeach
    </ul>
</body>
</html>
