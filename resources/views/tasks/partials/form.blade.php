<div class="container mx-auto p-4">
    <h1>{{ isset($task) ? 'Edit' : 'Create a New'}} Task</h1>

    <form method="POST" action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}">
        @csrf
        @if(isset($task))
            @method('PUT')
        @endif
    
        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" class="form-control" name="title" value="{{ $task->title ?? '' }}" required>
        </div>
    
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description">{{ $task->description ?? '' }}</textarea>
        </div>
    
        <button type="submit" class="btn btn-primary mx-2">Save</button>
    </form>

    <a href="{{ route('tasks.index') }}" class="btn btn-warning m-2">← Back to Tasks</a>
</div>