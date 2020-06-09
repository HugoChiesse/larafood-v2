<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $product, $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function categories($idProduct)
    {
        $product = $this->product->find($idProduct);
        if (!$product) {
            return redirect()->back();
        }
        $categories = $product->categories()->orderBy('name')->paginate();
        return view('admin.pages.products.categories.categories', compact('product', 'categories'));
    }

    public function create(Request $request, $idProduct)
    {
        $product = $this->product->find($idProduct);
        if (!$product) {
            return redirect()->back();
        }
        $filters = $request->except('_token');
        $categories = $product->categoriesAvailable($request->filter);
        return view('admin.pages.products.categories.create', compact('product', 'categories', 'filters'));
    }

    public function store(Request $request, $idProduct)
    {
        $product = $this->product->find($idProduct);
        if (!$product) {
            return redirect()->back();
        }
        if (!$request->categories || count($request->categories) == 0) {
            return redirect()->back()->with('info', 'É necessário escolher pelo menos uma categoria!');
        }
        $product->categories()->attach($request->categories);
        return redirect()->route('products.categories', $product);
    }

    public function delete($idProduct, $idCategory)
    {
        $product = $this->product->find($idProduct);
        $category = $this->category->find($idCategory);
        if (!$product || !$category) {
            return redirect()->back();
        }
        $product->categories()->detach($category);
        return redirect()->back();
    }

    public function products($idCategory)
    {
        $category = $this->category->find($idCategory);
        if (!$category) {
            return redirect()->back();
        }
        $products = $category->products()->orderBy('name')->paginate();
        return view('admin.pages.categories.products.products', compact('category', 'products'));
    }
}
