<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    
    public function index()
    {
        $arts = Article::with('users')->paginate(3);

        $userlar = User::with('department')->get();
        return view('index',compact('arts','userlar'));
    }

    public function cabinet()
    {
        $article = Article::with('users')->get();
        $deps = Department::all();
        return view('user.cabinet', compact('article','deps'));
    }


    public function download($id)
    {

        $file = Article::find($id);

        $f_path=storage_path('app/public/' . $file->file_url);
        return response()->download($f_path);
    }
    
}
