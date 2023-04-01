<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = Auth::user()
        ->tasks()
        ->when($request->search, function($query) use($request) {
            return $query->where('name', 'LIKE', '%' . $request->search . '%');
        })
        ->when($request->status, function($query) use($request) {
            return $query->where('status', '=', $request->status);
        })
        ->when($request->priority, function($query) use($request) {
            return $query->where('priority', '=', $request->priority);
        })
        ->get();

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tasks.add', [ 'name' => $request->name ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:300'],
            'status' => ['in:toDo,inProgress,completed'],
            'priority' => ['in:na,high,medium,low'],
            'dueDate' => ['nullable', 'date_format:Y-m-d'],
            'remindBefore' => ['in:0,1,2,3']
        ]);

        Task::cretaeTask(
            $request->name,
            $request->description,
            $request->status,
            $request->priority,
            $request->dueDate,
            $request->remindBefore
        );

        return redirect()->route('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', [ 'task' => $task ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        if( $task && (Auth::user()->id == $task->user_id) )
        {
            $request->validate([
                'name' => ['required', 'string', 'max:100'],
                'description' => ['nullable', 'string', 'max:300'],
                'status' => ['in:toDo,inProgress,completed'],
                'priority' => ['in:na,high,medium,low'],
                'dueDate' => ['nullable', 'date_format:Y-m-d'],
                'remindBefore' => ['in:0,1,2,3']
            ]);

            $task->updateTask(
                $request->name,
                $request->description,
                $request->status,
                $request->priority,
                $request->dueDate,
                $request->remindBefore
            );

            return redirect()->route('tasks');
        }

        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if( $task && (Auth::user()->id == $task->user_id) )
        {
            $task->delete();

            return redirect()->route('tasks');
        }

        return abort(404);
    }
}
