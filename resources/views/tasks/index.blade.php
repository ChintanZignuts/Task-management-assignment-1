   <x-app-layout>
       <x-slot name="header" class="m-5">
           <h1 class="font-semibold text-xl text-white-800 leading-tight text-center">
               {{ __('Task List ') }}
           </h1>
       </x-slot>
       <section class="m-5">
           <div class="flex flex-col justify-center items-center w-screen">
               @if (session('success'))
                   <div class="alert alert-success">
                       {{ session('success') }}
                   </div>
               @endif
               <div class="flex justify-center ">

                   <a href="{{ route('tasks.create') }}"
                       class="text-black hover:text-white  bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 rounded-lg text-base font-bold px-5 py-2.5 text-center me-2 mb-2">Create
                       New Task</a>
               </div>
               <div class="flex bg-slate-500 justify-center items-center m-5">
                   <table class="table-auto w-full bg-white border border-gray-300 rounded">
                       <thead class="rounded">
                           <tr class="bg-gray-200">
                               <th class="px-4 py-2">No.</th>
                               <th class="px-4 py-2">Title</th>
                               <th class="px-4 py-2">Description</th>
                               <th class="px-4 py-2">Due Date</th>
                               <th class="px-4 py-2">Actions</th>
                           </tr>
                       </thead>
                       <tbody>
                           @php
                               $counter = 1;
                           @endphp
                           @forelse ($tasks as $task)
                               <tr class="hover:bg-gray-100">
                                   <td class="border px-4 py-2 text-center">{{ $counter++ }}</td>
                                   <td class="border px-4 py-2 text-center">
                                       <a href="{{ route('tasks.show', ['task' => $task->id]) }}">
                                           {{ \Illuminate\Support\Str::limit($task->title, 20) }}</a>
                                   </td>
                                   <td class="border px-4 py-2 text-center">
                                       {{ \Illuminate\Support\Str::limit($task->description, 30) }}</td>
                                   <td class="border px-4 py-2 text-center">{{ $task->due_date }}</td>
                                   <td class="border px-4 py-2 text-center">
                                       <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                                           class="text-white
                                           bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4
                                           focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center
                                           me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700
                                           dark:focus:ring-blue-800">View</a>
                                       <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                                           class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900">Edit</a>
                                       <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}"
                                           method="post" class="inline">
                                           @csrf
                                           @method('DELETE')
                                           <button type="submit" onclick="return confirm('Are you sure?')"
                                               class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                       </form>
                                   </td>
                               </tr>
                           @empty
                               <tr>
                                   <td colspan="5" class="border px-4 py-2">No tasks found.</td>
                               </tr>
                           @endforelse
                       </tbody>
                   </table>

               </div>

           </div>
       </section>
   </x-app-layout>
