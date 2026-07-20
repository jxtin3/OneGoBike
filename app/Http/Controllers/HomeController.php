<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = \App\Models\News::published()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('home', compact('latestNews'));
    }}
