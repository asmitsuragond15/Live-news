<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('dashboard', compact('news'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'textbox' => 'nullable|string',
            'links.*' => 'nullable|url',
            'link.*' => 'nullable|url',
        ]);
    
        $news = News::create([
            'category' => $request->input('category'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'textbox' => $request->input('textbox'),
            'links' => json_encode($request->input('links')),
            'link' => json_encode($request->input('link')),
        ]);
    
        return redirect()->route('news.index');
    }
    
    public function edit(News $news)
    {
        return view('edit', compact('news'));
    }
    public function update(Request $request, News $news)
    {
        $request->validate([
            'category' => 'required|string',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'textbox' => 'nullable|string',
            'links.*' => 'nullable|url',
            'link.*' => 'nullable|url',
        ]);
    
        $news->update([
            'category' => $request->input('category'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'textbox' => $request->input('textbox'),
            'links' => json_encode($request->input('links')),
            'link' => json_encode($request->input('link')),
        ]);
    
        return redirect()->route('news.index');
    }
    

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('news.index');
    }
}
