<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function search(Request $request)
    {
        $s = $request->query('s');

        $product_search = Product::search($s)->get();

        $products = Product::query();

        $products->withWhereHas('category', function (Builder $query) use ($s) {
            $query->where('title', 'LIKE', '%'.$s.'%');
        });
        $products->withWhereHas('company', function (Builder $query) use ($s) {
            $query->orWhere('title', 'LIKE', '%'.$s.'%');
        });

        $products = $products->get()->merge($product_search);

        return ProductResource::collection($products);
    }
}
