<x-app-layout>
    <x-slot name="header" class="m-5">
        <h1 class="font-semibold text-xl text-white-800 leading-tight text-center">
            {{ __('Task List') }}
        </h1>
    </x-slot>
    <section class="m-5">
        <div class="flex justify-center">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="flex justify-center mb-3">
            <a href="{{ route('tasks.create') }}" class="btn btn-success">Create New Task</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($tasks as $task)
                <div class="border rounded-lg p-4 hover:bg-gray-100">
                    <h2 class="text-lg font-semibold mb-2"><a
                            href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ \Illuminate\Support\Str::limit($task->title, 20) }}</a>
                    </h2>
                    <p class="text-sm mb-2">{{ \Illuminate\Support\Str::limit($task->description, 30) }}</p>
                    <p class="text-sm mb-2"><strong>Due Date:</strong> {{ $task->due_date }}</p>
                    <div class="flex justify-between">
                        <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')"
                                class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center col-span-3">No tasks found.</p>
            @endforelse
        </div>
        <div class="mt-4 flex justify-center">
            {{ $tasks->links() }}
        </div>
    </section>
</x-app-layout>
