<!-- resources/views/tasks/create.blade.php -->

@extends('layouts.app')

@section('slot')
    <h1>Create a New Task</h1>

    <form action="{{ route('tasks.store') }}" method="post">
        @csrf

        <label for="title">Task Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>

        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" id="due_date" required>

        <!-- Add other fields as needed -->

        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
@endsection
