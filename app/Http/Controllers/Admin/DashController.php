<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class DashController extends Controller
{
    public function index()
    {
        $count_posts = Post::count();
        return view('admin.partials.dashboard', compact('count_posts'));
    }
}
