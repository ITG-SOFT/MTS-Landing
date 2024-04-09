<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Category $category
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(Category $category)
    {
        $title = __('messages.attribute.create');

        return view('admin.category.attribute.create', compact('title', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AttributeRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function store(AttributeRequest $request, Category $category)
    {
        $attribute = Attribute::createAttribute($request, $category);

        $redirect = redirect()->route('admin.categories.index');

        if (!$attribute) {
            return $redirect->with('error', __('messages.attribute.error.store'));
        }

        return $redirect->with('success', __('messages.attribute.success.store'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @param Attribute $attribute
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(Category $category, Attribute $attribute)
    {
        $title = __('messages.attribute.edit', ['category' => $category->title]);

        return view('admin.category.attribute.edit', compact('title', 'category', 'attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AttributeRequest $request
     * @param Category $category
     * @param Attribute $attribute
     * @return RedirectResponse
     */
    public function update(AttributeRequest $request, Category $category, Attribute $attribute)
    {
        $result = Attribute::updateAttribute($request, $attribute);

        $redirect = redirect()->route('admin.categories.index');

        if (!$result) {
            return $redirect->with('error', __('messages.attribute.error.update'));
        }

        return $redirect->with('success', __('messages.attribute.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @param Attribute $attribute
     * @return RedirectResponse
     */
    public function destroy(Category $category, Attribute $attribute)
    {
        $result = Attribute::deleteAttribute($attribute);

        $redirect = redirect()->back();

        if (!$result) {
            return $redirect->with('error', __('messages.attribute.error.destroy'));
        }

        return $redirect->with('success', __('messages.attribute.success.destroy'));
    }
}
