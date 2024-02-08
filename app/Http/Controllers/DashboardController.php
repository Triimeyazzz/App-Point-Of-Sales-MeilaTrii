<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $users_count = User::count();

        return view('dashboard.index', compact('users_count'));
    }
}
