<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Picture;
use App\Models\User;

class OperationsController extends Controller
{
    public function index()
    {
        return view('admin.operations.index', [
            'newsCount' => News::count(),
            'publishedNewsCount' => News::where('is_published', true)->count(),
            'pictureCount' => Picture::count(),
            'userCount' => User::count(),
            'activeUserCount' => User::where('status', 'Active')->count(),
        ]);
    }
}
