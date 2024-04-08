<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $title = __('messages.product.plural');

        $products = Product::query();

        $products->with('company');
        $products->with('category');
        $products->orderBy('created_at', 'DESC');

        $products = $products->get();

        return view('admin.product.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $title = __('messages.product.create');

        $categories = Category::getCategories();
        $companies = Company::getCompanies();

        return view('admin.product.create', compact('title', 'categories', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $product = Product::createProduct($request);

        $redirect = redirect()->route('admin.products.index');

        if (!$product) {
            return $redirect->with('error', __('messages.product.error.store'));
        }

        return $redirect->with('success', __('messages.product.success.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {
        $title = __('messages.product.edit', ['product' => $product->name]);

        $categories = Category::getCategories();
        $companies = Company::getCompanies();

        return view('admin.product.edit', compact('title', 'product', 'categories', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(ProductRequest $request, Product $product)
    {
        $result = Product::updateProduct($request, $product);

        $redirect = redirect()->route('admin.products.index');

        if (!$result) {
            return $redirect->with('error', __('messages.product.error.update'));
        }

        return $redirect->with('success', __('messages.product.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product)
    {
        $result = Product::deleteProduct($product);

        $redirect = redirect()->back();

        if (!$result) {
            return $redirect->with('error', __('messages.product.error.destroy'));
        }

        return $redirect->with('success', __('messages.product.success.destroy'));
    }
}
