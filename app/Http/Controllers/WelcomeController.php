<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {


        $categories = Category::all();

        $posts = Post::where('published', true)
            ->filter(request()->all())
            // ->orderBy('published_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('welcome', compact('posts', 'categories'));
    }
}
