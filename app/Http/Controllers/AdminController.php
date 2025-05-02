<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $user_id = auth()->user()->id;
        $categoryCount = Category::count();
        $postCount = Post::where('user_id', $user_id)->count();
        return view('admin.dashboard', compact('categoryCount', 'postCount'));
    }
}
