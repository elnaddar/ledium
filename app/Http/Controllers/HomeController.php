<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $publishedPosts = Post::published();
        return view("home", [
            'featuredPosts' => $publishedPosts->featured()->latest("published_at")->take(3)->get(),
            'latestPosts' => $publishedPosts->latest("published_at")->take(9)->get(),
        ]);
    }
}
