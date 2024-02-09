<x-app-layout>
    <x-slot name="header" class="m-5">
        <h1 class="font-semibold text-xl text-white-800 leading-tight text-center">
            {{ __('Task Details') }}
        </h1>
    </x-slot>
    <section class="">
        <div class="flex justify-center bg-gray-100  mt-20">

            <div
                class="flex flex-col items-center justify-center border rounded-lg shadow-md p-8 bg-white w-full md:w-2/3 lg:w-1/2 xl:w-1/3">
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold">{{ $task->title }}</h2>
                    <p class="text-gray-600 mt-3">{{ $task->description }}</p>
                    <p class="text-gray-100 rounded bg-sky-300 w-fit p-1 mt-3">Due Date: {{ $task->due_date }}</p>
                </div>

                <div class="w-full md:inline-flex ">
                    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class=" w-full md:w-1/2 mr-2">
                        <button
                            class="text-black bg-gradient-to-r w-full from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br hover:text-white focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-lg px-5 py-2.5 text-center me-2 mb-2">
                            Edit
                        </button></a>
                    <form id="delete-form-{{ $task->id }}"
                        action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post"
                        class="w-full md:w-1/2 mt-2 md:mt-0">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete('delete-form-{{ $task->id }}')"
                            class="text-black text-lg bg-gradient-to-r from-red-400 via-red-500 to-red-600 w-full hover:bg-gradient-to-br hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg px-5 py-2.5 text-center me-2 mb-2"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>

                </div>
            </div>

        </div>

    </section>
</x-app-layout>
