<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Taskk;
use App\Models\Taskkk;
use App\Models\Taskkkk;
use App\Models\Taskkkkk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('/user/index', [
            'tasks' => Task::count(),
            'taskks' => Taskk::count(),
            'taskkks' => Taskkk::count(),
            'taskkkks' => Taskkkk::count(),
            'taskkkkks' => Taskkkkk::count(),
        ]);
    }
}
