<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Department;

class DashboardController extends Controller
{
    public function index()
    {
        $article = Article::with('users')->latest('id')->get();
        $deps = Department::all();
        
        return view('admin.dashboard', compact('article', 'deps'));
    }
}
