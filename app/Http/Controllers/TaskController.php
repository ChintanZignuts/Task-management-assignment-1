<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    //
    public function index(){
        $tasks=Task::all();
        return view('tasks.index',compact('tasks'));
    }
    public function show($id){
        $task=Task::findOrFail($id);
        return view('tasks.show',compact('task'));

    }
    public function create(){
        return view('tasks.create');
    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required|max:255',
            'description'=>'required',
            'due_date'=>'required|date',
            'user_id'=>'required|exists:users,id'
        ]);
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success','Task created successfully');

    }
    public function edit($id){
        $task=Task::findOrFail($id);
        return view('tasks.edit',compact('task'));

    }
    public function update(Request $request,$id){
        $validatedData=$request->validate([
            'title'=>'required|max:255',
            'description'=>'required',
            'due_date'=>'required|date',
        ]);
        $task=Task::findOrFail($id);
        $task->update($validatedData);
        return redirect()->route('tasks.index')->with('success','Task updated successfully');

    }
    public function destroy($id){
        $task=Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Task Deleted successfully');
    }
}
