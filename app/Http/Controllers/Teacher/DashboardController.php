<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Article;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $article = Article::ownedBy($user->id)->with('users')->latest('id')->get();
        
        return view('teacher.dashboard', compact('article'));
    }
}
