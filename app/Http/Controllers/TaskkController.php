<?php

namespace App\Http\Controllers;

use App\Models\Taskk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Taskk $taskk)
    {
        // Gate::authorize('manager', $task);
        Gate::define('access', function (Taskk $taskk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskk->hasRole(['manager', 'Member']);
        });
        return view('/user/taskk/index', [
            'tasks' => Taskk::latest('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Taskk $taskk)
    {
        Gate::authorize('manager', $taskk);
        return view('/user/taskk/create');
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

        Taskk::create($validatedData);
        return redirect('/user/taskk')->with('success', 'Congratulations, Data Has Been Saved Successfully....!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Taskk $taskk)
    {
        Gate::define('access', function (Taskk $taskk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskk->hasRole(['manager', 'Member']);
        });
        return view('user/taskk/show', [
            'taskk' => $taskk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Taskk $taskk)
    {
        Gate::define('access', function (Taskk $taskk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskk->hasRole(['manager', 'Member']);
        });
        return view('user/taskk/edit', [
            'taskk' => $taskk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Taskk $taskk)
    {
        Gate::define('access', function (Taskk $taskk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskk->hasRole(['manager', 'Member']);
        });
        $rules = [
            'description' => 'required|max:200',
            'deadline' => 'required|max:20',
            'status' => 'required|max:20'
        ];

        $validatedData = $request->validate($rules);

        Taskk::where('id', $taskk->id)->update($validatedData);
        return redirect('/user/taskk')->with('update', 'Congratulations, Data Has Been Successfully Edited....');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Taskk $taskk)
    {
        Gate::authorize('manager', $taskk);
        Taskk::destroy($taskk->id);
        return redirect('/user/taskk')->with('success', 'Congratulations, Data Has Been Successfully Deleted....');
    }
}
