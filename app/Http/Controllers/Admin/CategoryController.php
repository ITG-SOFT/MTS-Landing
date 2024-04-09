<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $title = __('messages.category.plural');

        $categories = Category::query();

        $categories->with('attributes');
        $categories->orderBy('created_at', 'DESC');

        $categories = $categories->get();

        return view('admin.category.index', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $title = __('messages.category.create');

        return view('admin.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::createCategory($request);

        $redirect = redirect()->route('admin.categories.index');

        if (!$category) {
            return $redirect->with('error', __('messages.category.error.store'));
        }

        return $redirect->with('success', __('messages.category.success.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        $title = __('messages.category.edit', ['category' => $category->title]);

        return view('admin.category.edit', compact('title', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $result = Category::updateCategory($request, $category);

        $redirect = redirect()->route('admin.categories.index');

        if (!$result) {
            return $redirect->with('error', __('messages.category.error.update'));
        }

        return $redirect->with('success', __('messages.category.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category)
    {
        $result = Category::deleteCategory($category);

        $redirect = redirect()->back();

        if (!$result) {
            return $redirect->with('error', __('messages.category.error.destroy'));
        }

        return $redirect->with('success', __('messages.category.success.destroy'));
    }
}
