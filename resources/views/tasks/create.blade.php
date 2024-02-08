<x-app-layout>
    <x-slot name="header" class="m-5">
        <h1 class="font-semibold text-xl text-white-800 leading-tight text-center">
            {{ __('Create a New Task') }}
        </h1>
    </x-slot>
    <section class="m-5">
        <div class="flex flex-col m-4 mt-5 justify-center items-center">
            <div class="w-full lg:max-w-3xl xl:max-w-2xl">
                <form action="{{ route('tasks.store') }}" method="post" class="w-full mt-5 m-4 text-lg">
                    @csrf
                    <div class="mb-4 flex flex-col">
                        <label for="title" class="text-gray-700">Task Title:</label>
                        <input type="text" name="title" id="title" required
                            class="border rounded-md p-2 focus:outline-none focus:border-green-500"
                            placeholder="Add Task Title">
                    </div>
                    <div class="mb-4 flex flex-col">
                        <label for="description" class="text-gray-700">Description:</label>
                        <textarea name="description" id="description" required
                            class="border rounded-md p-2 focus:outline-none focus:border-green-500 h-40" placeholder="Add Task Description"></textarea>
                    </div>
                    <div class="mb-4 flex flex-col">
                        <label for="due_date" class="text-gray-700">Due Date:</label>
                        <input type="date" name="due_date" id="due_date" required
                            class="border rounded-md p-2 focus:outline-none focus:border-green-500">
                    </div>

                    <input type="submit"
                        class="text-black text-xl bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg  px-5 py-2.5 text-center me-2 mb-2"
                        value="Create Task">
                </form>
            </div>
        </div>

    </section>
</x-app-layout>
