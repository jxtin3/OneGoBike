<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = \App\Models\News::published()
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('pages.news', compact('news'));
    }}
