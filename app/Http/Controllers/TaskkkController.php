<?php

namespace App\Http\Controllers;

use App\Models\Taskkk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskkkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Taskkk $taskkk)
    {
        // Gate::authorize('manager', $task);
        Gate::define('access', function (Taskkk $taskkk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskkk->hasRole(['manager', 'Member']);
        });
        return view('/user/taskkk/index', [
            'tasks' => Taskkk::latest('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Taskkk $taskkk)
    {
        Gate::authorize('manager', $taskkk);
        return view('/user/taskkk/create');
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

        Taskkk::create($validatedData);
        return redirect('/user/taskkk')->with('success', 'Congratulations, Data Has Been Saved Successfully....!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Taskkk $taskkk)
    {
        Gate::define('access', function (Taskkk $taskkk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskkk->hasRole(['manager', 'Member']);
        });
        return view('user/taskkk/show', [
            'taskkk' => $taskkk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Taskkk $taskkk)
    {
        Gate::define('access', function (Taskkk $taskkk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskkk->hasRole(['manager', 'Member']);
        });
        return view('user/taskkk/edit', [
            'taskkk' => $taskkk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Taskkk $taskkk)
    {
        Gate::define('access', function (Taskkk $taskkk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskkk->hasRole(['manager', 'Member']);
        });
        $rules = [
            'description' => 'required|max:200',
            'deadline' => 'required|max:20',
            'status' => 'required|max:20'
        ];

        $validatedData = $request->validate($rules);

        Taskkk::where('id', $taskkk->id)->update($validatedData);
        return redirect('/user/taskkk')->with('update', 'Congratulations, Data Has Been Successfully Edited....');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Taskkk $taskkk)
    {
        Gate::authorize('manager', $taskkk);
        Taskkk::destroy($taskkk->id);
        return redirect('/user/taskkk')->with('success', 'Congratulations, Data Has Been Successfully Deleted....');
    }
}
