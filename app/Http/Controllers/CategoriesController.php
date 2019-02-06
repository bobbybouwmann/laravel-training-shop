<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::with('image')->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());

        if ($request->has('path')) {
            $category->image()->create([
                'path' => $request->get('path')
            ]);
        }

        return redirect()->route('categories.show', $category);
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        if ($request->has('path')) {
            $category->image()->updateOrCreate([
                'imageable_id' => $category->id,
                'imageable_type' => Category::class,
            ], [
                'path' => $request->get('path')
            ]);
        }

        return redirect()->route('categories.show', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('message', 'Category successfully deleted');

        return redirect()->route('categories.index');
    }
}
