@extends('layouts.app')

@section('slot')
    <h1 class="text-center mt-3 font-extrabold text-lg" style="font-size: 3rem">Task Details</h1>
    <div class="flex justify-center items-center" style="height: 100vh">

        <div class="flex flex-col items-center justify-center border" style="height: 50%; width: 50%">
            <div class="flex flex-col">
                {{-- <p> <strong>ID:</strong> {{ $task->id }}</p> --}}
                <p><strong>Title:</strong> {{ $task->title }}</p>
                <p><strong>Description:</strong> {{ $task->description }}</p>
                <p><strong>Due Date:</strong> {{ $task->due_date }}</p>
            </div>
            <div>
                <button class="btn-danger btn">
                    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a></button>
                <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post" style="display:inline;"
                    class="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
