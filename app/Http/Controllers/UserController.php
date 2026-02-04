<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        // Gate::authorize('admin', $user);
        Gate::define('success', function (User $user) {
            // Izinkan jika role adalah admin ATAU editor
            return $user->hasRole(['manager', 'admin']);
        });
        return view('user/user/index', [
            'users' => User::latest('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        // Gate::authorize('admin', $user);
        Gate::define('success', function (User $user) {
            // Izinkan jika role adalah admin ATAU editor
            return $user->hasRole(['manager', 'admin']);
        });
        return view('user/user/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:200',
            'admin' => 'required|max:5',
            'project_manager' => 'required|max:5'
        ]);

        User::create($validatedData);
        return redirect('user/user')->with('success', 'Data yang anda kirimkan berhasil tersimpan ke dalam database kami, Terima Kasih...!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Gate::authorize('admin', $user);
        Gate::define('success', function (User $user) {
            // Izinkan jika role adalah admin ATAU editor
            return $user->hasRole(['manager', 'admin']);
        });
        return view('user/user/show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Gate::authorize('admin', $user);
        Gate::define('success', function (User $user) {
            // Izinkan jika role adalah admin ATAU editor
            return $user->hasRole(['manager', 'admin']);
        });
        return view('user/user/edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Gate::authorize('admin', $user);
        Gate::define('success', function (User $user) {
            // Izinkan jika role adalah admin ATAU editor
            return $user->hasRole(['manager', 'admin']);
        });
        $rules = [
            'name' => 'required|max:200',
            'password' => 'required|min:5|max:200',
            'admin' => 'max:5',
            'project_manager' => 'max:5'
        ];

        if($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validatedData = $request->validate($rules);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('id', $user->id)->update($validatedData);
        return redirect('/user/user')->with('update', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Gate::authorize('admin', $user);
        Gate::define('success', function (User $user) {
            // Izinkan jika role adalah admin ATAU editor
            return $user->hasRole(['manager', 'admin']);
        });
        User::destroy($user->id);
        return redirect('/user/user')->with('success', 'Data berhasil dihapus');
    }
}
