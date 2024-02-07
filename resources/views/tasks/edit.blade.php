<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('slot')
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="title">Task Title:</label>
        <input type="text" name="title" id="title" value="{{ $task->title }}" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required>{{ $task->description }}</textarea>

        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" id="due_date" value="{{ $task->due_date }}" required>

        <!-- Add other fields as needed -->

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
@endsection
