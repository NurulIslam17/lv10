<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoAppController extends Controller
{
    public function index()
    {
        $todos = Todo::orderby('id', 'desc')->get();
        return view('todo.index', ['todos' => $todos]);
    }
    public function store(Request $request)
    {
        Todo::insert([
            'todo' => $request->todo
        ]);
        return back()->with('msg', 'New Todo Added');
    }
}
