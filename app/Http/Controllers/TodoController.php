<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function Index(){
        $todos = Todo::where('Is_Deleted',0)->get();
        Return View('Todos.index',[
            'todos' => $todos
        ]);
    }
    public function TodosIndex(){
        return to_route('Todos.index');
    }
    public function Create(){
        Return View('Todos.create');
    }
    public function store(TodoRequest $request){
       // return $request->all();
       Todo::create([
        'title' => $request-> title,
        'description' => $request->description,
        'Is_Completed' => 0,
        'Is_Deleted' => 0
       ]);

       $request ->session()->flash('alert-success', 'Todo Created Successfully');
       return to_route('Todos.index');
    }
    public function show($id){
        $todo = Todo::find($id);
        if(! $todo){
            return to_route('Todos.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }
        return view('Todos.show', ['todo' => $todo]);
    }
    public function edit($id){
        $todo = Todo::find($id);
        if (!$todo) {
            return to_route('Todos.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }
        return view('Todos.edit', ['todo' => $todo]);
    }
    public function update(TodoRequest $request){
        $todo = Todo::find($request->todo_id);
        if (!$todo) {
            return to_route('Todos.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }
        $todo->update([
            'title'=>$request->title,
            'description' =>$request->description,
            'Is_Completed' => $request->is_completed,
        ]);
        $request->session()->flash('alert-info', 'Todo Updated Successfully');
        return to_route('Todos.index');
    }
    public function Destroy(Request $request){
        $todo = Todo::Find($request->todo_id);
        if (!$todo) {
            return to_route('Todos.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }
        $todo->update([
            'Is_Deleted'=>1
        ]);
        $request->session()->flash('alert-info', 'Todo Deleted Successfully');
        return to_route('Todos.index');
    }
    public function Completed($id){
        $todo = Todo::find($id);
        if (!$todo) {
            return to_route('Todos.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }
        if($todo->Is_Completed==0)
        $todo->update([
            'Is_Completed' =>1
        ]);
        else
        $todo->update([
            'Is_Completed' => 0
        ]);
        session()->flash('alert-info', 'Todo Status Changed Successfully');
        return to_route('Todos.index');

    }
}
