<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTodoList;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::latest()->get();

        return view('todo.index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveTodoList $request)
    {
        $todo = [
            'name' => $request->name,
            'due_date' => $request->due_date
        ];

        $insertedTodo = Todo::create($todo);

        if ($insertedTodo) {

            return redirect('/')->with('status', 'Todo Created Successfully!!!');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);

        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveTodoList $request, $id)
    {

        $todo = [
            'name' => request('name'),
            'due_date' => request('due_date')
        ];

        $updatedTodo = Todo::where('id', $id)->update($todo);

        if ($updatedTodo) {

            return redirect('/')->with('status', 'Todo Updated Successfully!!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedTodo = Todo::where('id', $id)->delete();

        if ($deletedTodo) {

            return redirect('/')->with('status', 'Todo Deleted Successfully!!!');
        }
    }

    public function complete($id) {

        $completedTodo = Todo::where('id', $id)->update(['status' => true]);
        
        if ($completedTodo) {

            return redirect('/')->with('status', 'Todo Completed Successfully!!!');
        }
    }
}
