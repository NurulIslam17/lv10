<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoAppController extends Controller
{
    public function index()
    {
        $todos = Todo::orderby('deadline', 'asc')->get();
        return view('todo.index', ['todos' => $todos]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        Todo::insert([
            'todo' => $request->todo,
            'deadline' => $request->deadline,
        ]);
        return back()->with('msg', 'New Todo Added');
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id)->delete();
        if ($todo) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function changeStatus($id)
    {
        $todo = Todo::findOrFail($id);
        // return response()->json(['data' => $todo]);
        if ($todo->status == 0) {
            $todo->status = 1;
            $todo->save();
            return response()->json(['status' => 1]);
        } else {
            $todo->status = 0;
            $todo->save();
            return response()->json(['status' => 0]);
        }
    }
}
