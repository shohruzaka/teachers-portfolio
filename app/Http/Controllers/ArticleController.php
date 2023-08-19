<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::selectRaw('CONCAT(first_name, " ", last_name) as full_name')->get();

        $users = User::select('id', 'first_name', 'last_name')->get()->toArray();
        // dd($users);
        return view('article.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|unique:articles',
            'annotation' => 'required',
            'journal_name' => 'required|',
            'pub_date' => 'date|required',
            'file_url' => 'file|required',
        ]);

        $data = $request->all();
        
        $file_url = $request->file('file_url')->store("maqola");
        $data['file_url'] = $file_url;

        $article = Article::create($data);
        $article->users()->sync($request->users);
        return redirect()->route('cabinet')->with('success',"Maqola xatosiz qo'shildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $users = User::select('id', 'first_name', 'last_name')->get()->toArray();
        return view('article.edit',compact('article', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'annotation' => 'required',
            'journal_name' => 'required',
            'pub_date' => 'date|required',
            'users'=>'required'
        ]);

        $data = $request->all();
        $ar = Article::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
