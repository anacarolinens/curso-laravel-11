<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $deletedUserCount = User::onlyTrashed()->count();
        $editedUserCount = User::whereColumn('updated_at', '>', 'created_at')->count();
        return view('dashboard', compact('userCount', 'deletedUserCount', 'editedUserCount'));
    }
}