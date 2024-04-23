<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->orderByDesc('id')->paginate(10);

        return view("pages.categories.index", compact('categories'));
    }

    public function create()
    {
        return view("pages.categories.create");
    }

    public function store(CreateCategoryRequest $request)
    {
        Category::query()->create(['name' => $request->input('name')]);

        return redirect()->route('categories.index');
    }

    public function edit(string $id)
    {
        $category = Category::query()->findOrFail($id);

        return view("pages.categories.edit", compact('category'));
    }

    public function update(int $id, CreateCategoryRequest $request)
    {
        Category::query()->where('id', $id)->update(['name' => $request->input('name')]);

        return redirect()->route('categories.index');
    }

    public function destroy(string $id)
    {
        Category::query()->findOrFail($id)->delete();

        return redirect()->route('categories.index');
    }
}
