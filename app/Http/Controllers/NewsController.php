<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News; // if you created a model


class NewsController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'textbox' => 'nullable|string',
            'links.*' => 'nullable|url',
        ]);

        News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'textbox' => $request->input('textbox'),
            'links' => json_encode($request->input('links')),
        ]);
        

        return redirect('/dashboard')->with('success', 'News posted successfully!');
    }
}

