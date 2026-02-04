<?php

namespace App\Http\Controllers;

use App\Models\Taskkkkk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskkkkkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::define('access', function (Taskkkkk $taskkkkk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskkkkk->hasRole(['manager', 'Member']);
        });
        return view('/user/taskkkkk/index', [
            'tasks' => Taskkkkk::latest('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Taskkkkk $taskkkkk)
    {
        Gate::authorize('manager', $taskkkkk);
        return view('/user/taskkkkk/create');
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

        Taskkkkk::create($validatedData);
        return redirect('/user/taskkkkk')->with('success', 'Congratulations, Data Has Been Saved Successfully....!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Taskkkkk $taskkkkk)
    {
        Gate::define('access', function (Taskkkkk $taskkkkk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskkkkk->hasRole(['manager', 'Member']);
        });
        return view('user/taskkkkk/show', [
            'taskkkkk' => $taskkkkk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Taskkkkk $taskkkkk)
    {
        Gate::define('access', function (Taskkkkk $taskkkkk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskkkkk->hasRole(['manager', 'Member']);
        });
        return view('user/taskkkkk/edit', [
            'taskkkkk' => $taskkkkk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Taskkkkk $taskkkkk)
    {
        Gate::define('access', function (Taskkkkk $taskkkkk) {
            // Izinkan jika role adalah admin ATAU editor
            return $taskkkkk->hasRole(['manager', 'Member']);
        });
        $rules = [
            'description' => 'required|max:200',
            'deadline' => 'required|max:20',
            'status' => 'required|max:20'
        ];

        $validatedData = $request->validate($rules);

        Taskkkkk::where('id', $taskkkkk->id)->update($validatedData);
        return redirect('/user/taskkkkk')->with('update', 'Congratulations, Data Has Been Successfully Edited....');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Taskkkkk $taskkkkk)
    {
        Gate::authorize('manager', $taskkkkk);
        Taskkkkk::destroy($taskkkkk->id);
        return redirect('/user/taskkkkk')->with('success', 'Congratulations, Data Has Been Successfully Deleted....');
    }
}
