<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Product\IndexProductResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;

class ProductController extends Controller
{

    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        /*$products = Product::filter($filter)->get();*/
        $products = Product::filter($filter)->paginate(12, ['*'], 'page', $data['page']);

        return IndexProductResource::collection($products);
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    public function filterList(): \Illuminate\Http\JsonResponse
    {
        $categories = Category::all();
        $colors = Color::all();
        $tags = Tag::all();

        $maxPrice = Product::orderBy('price', 'DESC')->first()->price;
        $minPrice = Product::orderBy('price', 'ASC')->first()->price;

        $result = [
          'categories' => $categories,
          'colors' => $colors,
          'tags' => $tags,
          'price' => [
              'max' => $maxPrice,
              'min' => $minPrice,
          ],
        ];

        return response()->json($result);
    }
}
