<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('slot')
    <div class="container">
        <h1 class="my-4">Task List</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>
                            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
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

        <a href="{{ route('tasks.create') }}" class="btn btn-success">Create New Task</a>
    </div>
@endsection
