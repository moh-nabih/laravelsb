<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>

    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ $task->title }}" required>
        </div>

        <div>
            <label>Description:</label>
            <textarea name="description">{{ $task->description }}</textarea>
        </div>

        <button type="submit">Update Task</button>
    </form>

    <a href="{{ route('tasks.index') }}">← Back to Tasks</a>
</body>
</html>
