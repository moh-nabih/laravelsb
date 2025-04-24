<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>
    <h1>Create a New Task</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div>
            <label>Title:</label>
            <input type="text" name="title" required>
        </div>

        <div>
            <label>Description:</label>
            <textarea name="description"></textarea>
        </div>

        <button type="submit">Save Task</button>
    </form>

    <a href="{{ route('tasks.index') }}">← Back to Tasks</a>
</body>
</html>
