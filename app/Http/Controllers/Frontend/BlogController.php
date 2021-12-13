<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function bloglist()
    {
        $blogs = Blog::all();
        return view('frontend.blogs.list', compact('blogs'));
    }

    public function blogview($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $blog->update([
            'view_counts' => $blog->view_counts + 1,
        ]);
        $relate = Blog::where('category_id', $blog->category_id)->take(2)->inRandomOrder()->get();

        $highlight = Blog::where('highlight_post', 1)
            ->take(3)->get();
        return view('frontend.blogs.view', compact('blog', 'relate'));
    }
}
