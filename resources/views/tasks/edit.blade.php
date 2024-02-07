@extends('layouts.app')

@section('slot')
    <div class="flex flex-col m-4 mt-5  justify-center items-center">
        <h1 style="font-weight: 800 ; font-size: 3rem">Edit Task</h1>
        <div style="width: 60%">
            <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="my-3 flex flex-col">
                    <label for="title">Task Title:</label>
                    <input type="text" name="title" id="title" required style="border-radius: 10px"
                        value="{{ $task->title }}">
                </div>
                <div class="my-3 flex flex-col">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" required style="height: 250px ;border-radius: 10px">{{ $task->description }}</textarea>
                </div>
                <div class="my-3 flex flex-col">
                    <label for="due_date">Due Date:</label>
                    <input type="date" name="due_date" id="due_date" required style="border-radius: 10px "
                        value="{{ $task->due_date }}">
                </div>

                <input type="submit" class="btn btn-primary" value="Edit Task" style="background: green;">
            </form>
        </div>

    </div>
@endsection
