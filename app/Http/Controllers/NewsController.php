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
        'category.*' => 'required|string',
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'textbox' => 'nullable|string',
        'links.*' => 'nullable|url',
        'more_links.*' => 'nullable|url',
    ]);

    $news = News::create([
        'category' =>  json_encode($request->input('category')),
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'textbox' => $request->input('textbox'),
        'links' =>  json_encode($request->input('links')),
        'more_links' =>  json_encode($request->input('more_links')),
    ]);

    return redirect()->route('news.index');
}

    // Other controller methods...


    
    public function edit(News $news)
    {
        return view('edit', compact('news'));
    }
    public function update(Request $request, News $news)
    {
        $request->validate([
            'category.*' => 'required|string',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'textbox' => 'nullable|string',
            'links.*' => 'nullable|url', // Validate each link in the array
            'more_links.*' => 'nullable|url', // Validate each more_link in the array
        ]);
    
        $news->update([
            'category' =>  json_encode($request->input('category')),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'textbox' => $request->input('textbox'),
            'links' => json_encode($request->input('links')),
            'more_links' => json_encode($request->input('more_links')),
        ]);
    
        return redirect()->route('news.index');
    }
    

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('news.index');
    }
}
