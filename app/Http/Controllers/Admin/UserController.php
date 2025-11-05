<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Fetch different categories
        $allUsers = User::all();
        $admins = User::where('role', 'admin')->get();
        $regularUsers = User::where('role', 'user')->get();
        $activeUsers = User::where('active', true)->get();
        $inactiveUsers = User::where('active', false)->get();

        return view('admin.users.index', compact(
            'allUsers',
            'admins',
            'regularUsers',
            'activeUsers',
            'inactiveUsers'
        ));
    }
}
