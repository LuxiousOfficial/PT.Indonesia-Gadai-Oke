<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Task $task)
    {
        // Gate::authorize('manager', $task);
        Gate::define('access', function (Task $task) {
            // Izinkan jika role adalah admin ATAU editor
            return $task->hasRole(['manager', 'Member']);
        });
        return view('/user/task/index', [
            'tasks' => Task::latest('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Task $task)
    {
        Gate::authorize('manager', $task);
        return view('/user/task/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|max:200',
            'deadline' => 'required|max:20',
            'status' => 'required|max:20'
        ]);

        Task::create($validatedData);
    return redirect('/user/task')->with('success', 'Congratulations, Data Has Been Saved Successfully...!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        Gate::define('access', function (Task $task) {
            // Izinkan jika role adalah admin ATAU editor
            return $task->hasRole(['manager', 'Member']);
        });
        return view('user/task/show', [
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        Gate::define('access', function (Task $task) {
            // Izinkan jika role adalah admin ATAU editor
            return $task->hasRole(['manager', 'Member']);
        });
        return view('user/task/edit', [
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        Gate::define('access', function (Task $task) {
            // Izinkan jika role adalah admin ATAU editor
            return $task->hasRole(['manager', 'Member']);
        });
        $rules = [
            'description' => 'required|max:200',
            'deadline' => 'required|max:20',
            'status' => 'required|max:20'
        ];

        $validatedData = $request->validate($rules);

        Task::where('id', $task->id)->update($validatedData);
        return redirect('/user/task')->with('update', 'Congratulations, Data Has Been Successfully Edited....');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Gate::authorize('manager', $task);
        Task::destroy($task->id);
        return redirect('/user/task')->with('success', 'Congratulations, Data Has Been Successfully Deleted....');
    }
}
