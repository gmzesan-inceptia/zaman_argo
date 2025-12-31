<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $featured = Product::where('tag', 'featured')->latest()->limit(3)->get();
        $products = Product::latest()->limit(8)->get();
        return view('frontend.index', compact('categories', 'featured', 'products'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function products(Request $request)
    {
        $query = Product::query();

        // Search filter
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        // Category filter
        if ($request->has('category') && !empty($request->category) && $request->category !== 'all') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        // Sorting
        if ($request->has('sort') && !empty($request->sort)) {
            if ($request->sort === 'price-asc') {
                $query->orderBy('new_price', 'asc');
            } elseif ($request->sort === 'price-desc') {
                $query->orderBy('new_price', 'desc');
            } else {
                $query->latest();
            }
        } else {
            $query->latest();
        }

        // Pagination - 12 items per page
        $products = $query->paginate(12);
        $categories = Category::all();

        return view('frontend.products', compact('products', 'categories'));
    }

    public function productDetails($id)
    {
        $product = Product::with('category', 'images')->findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
                                    ->where('id', '!=', $product->id)
                                    ->limit(4)
                                    ->get();
        $shippingCharge = 100; // Global shipping charge in BDT
        return view('frontend.product-details', compact('product', 'relatedProducts', 'shippingCharge'));
    }

    
    public function contact()
    {
        return view('frontend.contact');
    }

    public function orderSuccess($order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('frontend.order-success', compact('order'));
    }
}
