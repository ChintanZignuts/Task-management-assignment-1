<!-- resources/views/tasks/create.blade.php -->

@extends('layouts.app')

@section('slot')
    <div class="flex flex-col m-4 mt-5  justify-center items-center">
        <h1 class="text-lg font-bold " style="font-weight: 800 ; font-size: 3rem">Create a New Task</h1>

        <div style="width: 60%">
            <form action="{{ route('tasks.store') }}" method="post" class="w-full mt-5 m-4 text-lg">
                @csrf
                <div class="my-3 flex flex-col">
                    <label for="title">Task Title:</label>
                    <input type="text" name="title" id="title" required style="border-radius: 10px"
                        placeholder="Add Task Title">
                </div>
                <div class="my-3 flex flex-col">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" required style="height: 250px ;border-radius: 10px"
                        placeholder="Add Task Description "></textarea>
                </div>
                <div class="my-3 flex flex-col">
                    <label for="due_date">Due Date:</label>
                    <input type="date" name="due_date" id="due_date" required style="border-radius: 10px ">
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <input type="submit" class="btn btn-primary" value="Create Task" style="background: green;">
            </form>
        </div>

    </div>
@endsection
