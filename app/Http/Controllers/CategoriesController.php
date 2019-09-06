<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    public function index(): View
    {
        $categories = Cache::remember('categories', now()->addMinute(), function () {
            return Category::with('image')->get();
        });

        return view('categories.index', compact('categories'));
    }

    public function create(): View
    {
        $this->authorize('create', Category::class);

        return view('categories.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $this->authorize('create', Category::class);

        $category = Category::create($request->all());

        return redirect()->route('categories.show', $category);
    }

    public function show(Category $category): View
    {
        $this->authorize('view', $category);

        return view('categories.show', compact('category'));
    }

    public function edit(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $this->authorize('update', $category);

        $category->update($request->all());

        return redirect()->route('categories.show', $category);
    }

    public function destroy(Category $category): RedirectResponse
    {
        $this->authorize('delete', $category);

        $category->delete();

        session()->flash('message', 'Category successfully deleted');

        return redirect()->route('categories.index');
    }
}
