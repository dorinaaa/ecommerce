<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function show(Category $categoryId)
    {
        $category = Category::find($categoryId);

        if (! $category) {
            return response()->json('Not found', 404);
        }

        return response()->json($category, 200);
    }

    public function store(Request $request)
    {
        try {
            $category = Category::create($request->all());
        } catch (\Exception $exception) {
            \Log::error('Could not create Category', [$exception->getMessage()]);

            return response()->json($exception->getMessage());
        }

        return response()->json('Category added successfully!', 200);
    }

    public function update(Request $request, $categoryId)
    {
        $category = Category::find($categoryId);

        if (! $category) {
            return resource()->json('Category not found', 404);
        }

        try {
            $category->update($request->all());
        } catch (\Exception $exception) {
            \Log::error('Could not update Category', [$exception->getMessage()]);

            return response()->json($exception->getMessage());
        }

        return response()->json('Category was updated!', 200);
    }

    public function delete($categoryId)
    {
        $category = Category::find($categoryId);

        if (! $category) {
            return response()->json('Category not found', 404);
        }
        try {
            Category::destroy($categoryId);

            return response()->json('SUCCESS', 200);
        } catch (\Exception $exception) {
            \Log::error('Could not delete Category', [$exception->getMessage()]);

            return response()->json($exception->getMessage());
        }
    }
}
