<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $users = User::select('id', 'first_name', 'last_name')->get()->toArray();
        return view('article.create', compact('users'));
    }

    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();
        $data['file_url'] = $request->file('file_url')->store("maqola");

        $article = Article::create($data);

        // O'qituvchi o'zini mualliflar qatoridan olib tashlamasligi uchun
        $users = $request->users ?? [];
        if (!auth()->user()->hasRole('Admin') && !in_array(auth()->id(), $users)) {
            $users[] = auth()->id();
        }

        $article->users()->sync($users);
        
        return redirect()->route('cabinet')->with('success', "Maqola xatosiz qo'shildi");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        
        $this->authorize('update', $article);

        $users = User::select('id', 'first_name', 'last_name')->get()->toArray();
        return view('article.edit', compact('article', 'users'));
    }

    public function update(UpdateArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        $this->authorize('update', $article);

        $data = $request->validated();

        if ($request->hasFile('file_url')) {
            if ($article->file_url && Storage::exists($article->file_url)) {
                Storage::delete($article->file_url);
            }
            $data['file_url'] = $request->file('file_url')->store('maqola');
        } else {
            unset($data['file_url']);
        }

        $article->update($data);

        $users = $request->users ?? [];
        if (!auth()->user()->hasRole('Admin') && !in_array(auth()->id(), $users)) {
            $users[] = auth()->id();
        }
        
        $article->users()->sync($users);

        return redirect()->route('cabinet')->with('success', 'Maqola muvaffaqiyatli tahrirlandi');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        $this->authorize('delete', $article);

        if ($article->file_url && Storage::exists($article->file_url)) {
            Storage::delete($article->file_url);
        }

        $article->users()->detach();
        $article->delete();

        return redirect()->back()->with('success', 'Maqola muvaffaqiyatli o\'chirildi');
    }
}

