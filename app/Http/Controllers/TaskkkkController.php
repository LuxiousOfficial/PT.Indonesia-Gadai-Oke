<?php

namespace App\Http\Controllers;

use App\Models\Taskkkk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskkkkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Taskkkk $taskkkk)
    {
        Gate::define('access', function (Taskkkk $taskkkk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskkkk->hasRole(['manager', 'Member']);
        });
        return view('/user/taskkkk/index', [
            'tasks' => Taskkkk::latest('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Taskkkk $taskkkk)
    {
        Gate::authorize('manager', $taskkkk);
        return view('/user/taskkkk/create');
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

        Taskkkk::create($validatedData);
        return redirect('/user/taskkkk')->with('success', 'Congratulations, Data Has Been Saved Successfully....!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Taskkkk $taskkkk)
    {
        Gate::define('access', function (Taskkkk $taskkkk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskkkk->hasRole(['manager', 'Member']);
        });
        return view('user/taskkkk/show', [
            'taskkkk' => $taskkkk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Taskkkk $taskkkk)
    {
        Gate::define('access', function (Taskkkk $taskkkk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskkkk->hasRole(['manager', 'Member']);
        });
        return view('user/taskkkk/edit', [
            'taskkkk' => $taskkkk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Taskkkk $taskkkk)
    {
        Gate::define('access', function (Taskkkk $taskkkk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskkkk->hasRole(['manager', 'Member']);
        });
        $rules = [
            'description' => 'required|max:200',
            'deadline' => 'required|max:20',
            'status' => 'required|max:20'
        ];

        $validatedData = $request->validate($rules);

        Taskkkk::where('id', $taskkkk->id)->update($validatedData);
        return redirect('/user/taskkkk')->with('update', 'Congratulations, Data Has Been Successfully Edited....');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Taskkkk $taskkkk)
    {
        Gate::authorize('manager', $taskkkk);
        Taskkkk::destroy($taskkkk->id);
        return redirect('/user/taskkkk')->with('success', 'Congratulations, Data Has Been Successfully Deleted....');
    }
}
