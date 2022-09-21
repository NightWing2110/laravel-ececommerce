<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function add()
    {
//        $category = Category::where('parent_id', 0)->get();
        $category = Category::orderBy('name','ASC')->get();
        return view('admin.category.add', compact('category'));
    }

    public function insert(Request $request)
    {
        $category = new Category();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category/', $filename);
            $category->image = $filename;
        }
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'parent_id' => 'required',
            'image' => 'required'
        ]);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status == TRUE ? '1' : '0';
        $category->popular = $request->popular == TRUE ? '1' : '0';
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->route('admin.categories.index')->with('status', 'Create Category Successfully');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::orderBy('name','ASC')->get();
        return view('admin.category.edit', compact('category','categories'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status == TRUE ? '1' : '0';
        $category->popular = $request->popular == TRUE ? '1' : '0';
        $category->parent_id = $request->parent_id;
        $category->update();
        return redirect()->route('admin.categories.index')->with('status', 'Category Update Successfully');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if ($category->image) {
            $path = 'assets/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('status', 'Delete Category Successfully');
    }
}
