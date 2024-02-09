<x-app-layout>
    <x-slot name="header" class="m-5">
        <h1 class="font-semibold text-xl text-white-800 leading-tight text-center">
            {{ __('Task List') }}
        </h1>
    </x-slot>
    <section class="m-5 flex justify-center flex-col max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <div
            class="text-black text-xl bg-gradient-to-r from-green-400 via-green-500 to-green-600
            hover:bg-gradient-to-br hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300
            dark:focus:ring-green-800 font-medium rounded-lg px-5 py-2.5 text-center me-2 mb-2 w-fit">
            <a href="{{ route('tasks.create') }}">Create New Task</a>
        </div>
        <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 ">
            @forelse ($tasks as $task)
                <div class="border rounded-lg p-4 hover:bg-gray-100 bg-white flex justify-between">


                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="w-full">
                        <h2 class="text-lg font-semibold mb-2">
                            {{ \Illuminate\Support\Str::limit($task->title, 20) }}
                        </h2>
                        <p class="text-sm mb-2">{{ \Illuminate\Support\Str::limit($task->description, 30) }}</p>
                        <hr>
                        <p class="text-sm my-2 "><strong>Due Date:</strong> {{ $task->due_date }}</p>
                    </a>

                    <div class="justify-end h-[50px] inline-flex">
                        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="h-[50px] w-[50px]"><img
                                src="{{ asset('icons8-edit-100.png') }}" alt="Example GIF">
                        </a>
                        <form id="delete-form-{{ $task->id }}"
                            action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post"
                            class="h-[50px] w-[50px]">
                            @csrf
                            @method('DELETE')

                            <button type="button" onclick="confirmDelete('delete-form-{{ $task->id }}')">
                                <img src="{{ asset('icons8-delete-100.png') }}" alt="Delete">
                            </button>
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
