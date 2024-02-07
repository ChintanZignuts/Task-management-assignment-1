@extends('layouts.app')

@section('slot')
    <div class="container">
        <h1 class="my-4">Task List</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif



        <div class="mt-10">
            <table class="border table table-striped" style="border-radius: 10px">
                <thead>
                    <tr class="text-center rounded">
                        <th>No.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr class="text-center">
                            <td class="align-middle">{{ $task->id }}</td>
                            <td class="align-middle">{{ \Illuminate\Support\Str::limit($task->title, 10) }}</td>
                            <td class="align-middle">{{ \Illuminate\Support\Str::limit($task->description, 20) }}</td>
                            <td class="align-middle">{{ $task->due_date }}</td>
                            <td class="flex gap-3 justify-center">
                                <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="btn btn-info ">View</a>
                                <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-warning ">Edit</a>
                                <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post"
                                    style="display:block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                        style="background: red;color: black">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No tasks found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('tasks.create') }}" class="btn btn-success">Create New Task</a>
    </div>
@endsection
