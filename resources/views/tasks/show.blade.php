<!-- resources/views/tasks/show.blade.php -->

@extends('layouts.app')

@section('slot')
    <h1 class="text-center mt-5">Task Details</h1>

    <div class="flex flex-col">
        <p> <strong>ID:</strong> {{ $task->id }}</p>
        <p><strong>Title:</strong> {{ $task->title }}</p>
        <p><strong>Description:</strong> {{ $task->description }}</p>
        <p><strong>Due Date:</strong> {{ $task->due_date }}</p>
    </div>
    <button class="btn-danger btn">
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a></button>
    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection
