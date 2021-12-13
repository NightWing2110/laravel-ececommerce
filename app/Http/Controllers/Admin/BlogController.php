<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return view('admin.blog.index', compact('blog'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.blog.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $blogs = new Blog();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/blog/', $filename);
            $blogs->image = $filename;
        }
        $blogs->title = $request->title;
        $blogs->category_id = $request->category_id;
        $blogs->description = $request->description;
        $blogs->content = $request->content;
        $blogs->new_post = $request->new_post == TRUE ? '1' : '0';
        $blogs->highlight_post = $request->highlight_post == TRUE ? '1' : '0';
        $blogs->user_id = 3;
        $blogs->slug = Str::slug($request->title);
        $blogs->view_counts = 0;
        $blogs->save();
        return redirect()->route('admin.blog.index')->with('status', 'Create Blog Successfully');
    }

    public function edit($id)
    {
        $blogs = Blog::find($id);
        $categories = Category::all();
        return view('admin.blog.edit', compact('blogs', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $blogs = Blog::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/blog' . $blogs->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/blog', $filename);
            $blogs->image = $filename;
        }
        $blogs->title = $request->title;
        $blogs->category_id = $request->category_id;
        $blogs->description = $request->description;
        $blogs->content = $request->content;
        $blogs->new_post = $request->new_post == TRUE ? '1' : '0';
        $blogs->highlight_post = $request->highlight_post == TRUE ? '1' : '0';
        $blogs->user_id = 3;
        $blogs->slug = Str::slug($request->title);
        $blogs->view_counts = 0;
        $blogs->save();
        return redirect()->route('admin.blog.index')->with('status', 'Updated Blog Successfully');
    }

    public function delete($id)
    {
        $blogs = Blog::find($id);
        $path = 'assets/uploads/blog' . $blogs->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $blogs->delete();
        return redirect()->route('admin.blog.index')->with('status', 'Deleted Blog Successfully');
    }
}
