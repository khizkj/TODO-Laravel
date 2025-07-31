<?php

namespace App\Http\Controllers;

use App\Models\todo;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todo = Auth::user()->todos()->latest()->paginate(10);
        return view('todos.index', ['todo' => $todo]);
    }
    public function create()
    {


        return view("todos.create");
    }
    public function store()
{
    $tasks = request()->validate([
        'task'        => ['required','string','max:100'],
        'description' => ['required','string','max:255'],
    ]);
    Auth::user()->todos()->create($tasks);


    return redirect('/todos')->with('success', 'Task created!');
}

    public function edit(todo $todo)
    {
    return view("todos.edit", ["todo" => $todo]);
    }
    public function update(todo $todo){
        $attributes = request()->validate([
            'task'=>['required','string','min:3','max:100'],
            'description'=>['required','string','max:255'],
        ]);
        $todo->update($attributes);
        return redirect('/todos');

    }
    public function destroy(todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Task deleted');
    }
}
