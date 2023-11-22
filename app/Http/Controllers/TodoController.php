<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function Index(){
        $todos = Todo::all();
        Return View('Todos.index',[
            'todos' => $todos
        ]);
    }
    public function Create(){
        Return View('Todos.create');
    }
    public function store(TodoRequest $request){
       // return $request->all();
       Todo::create([
        'title' => $request-> title,
        'description' => $request->description,
        'Is_Completed' => 0
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
}
