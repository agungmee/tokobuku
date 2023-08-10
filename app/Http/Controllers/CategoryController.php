<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   

        $categories = Category::paginate(10);

        $filterKeyword = $request->get('keyword');

        if($filterKeyword){
            $categories = Category::where("name", "LIKE", "%$filterKeyword%")->paginate(10);
            }


        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->get('name');

        $new_category = new Category;
        $new_category->name = $name;

        if ($request->file('image')) {
            $image_path = $request->file('image')->store('category_image', 'public');
            $new_category->image = $image_path;
        }

        $new_category->created_by = Auth::user()->id; //mengambil nilai id untuk created_by
        $new_category->slug = Str::slug($name, '-');
        $new_category->save();

        return redirect()->route('categories.create')->with('status', 'Category Successed Created');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $category_to_update = Category::findOrFail($id);

        return view('categories.edit', compact('category_to_update'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->get('name');
        $slug = $request->get('slug');

        $category = Category::findOrFail($id);

        $category->name = $name;
        $category->slug = $slug;

        if ($request->file('image')) {
            if ($category->image && file_exists(storage_path('app/public/'.$category->image))) {
                Storage::delete('public/'. $category->name);
            }

            $new_image = $request->file('image')->store('categories_image', 'public');

            $category->image = $new_image;
        }

        $category->updated_by = Auth::user()->id;
        $category->slug = Str::slug($name);

        $category->save();

        return redirect()->route('categories.edit', [$id])->with('status', 'Data Successfully Edited'); //$id untuk supaya tetap di id yang di edit

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category =  Category::findOrFail($id);

        $category->delete();

        return redirect()->route('categories.index')->with('status', 'Data Successfully Deleted');
        
    }
}
