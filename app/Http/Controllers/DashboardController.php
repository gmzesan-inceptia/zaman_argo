<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Order;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $subcategoryCount = SubCategory::count();
        $productCount = Product::count();
        $orderCount = Order::count();
        $totalRevenue = Order::sum('total_price');
        $monthlyRevenue = Order::whereMonth('created_at', now()->month)
                                ->whereYear('created_at', now()->year)
                                ->sum('total_price');
        $pendingOrders = Order::where('status', 'pending')->count();
        $completedOrders = Order::where('status', 'delivered')->count();

        // Get products count by category for chart
        $categoryLabels = Category::pluck('name')->toArray();
        $categoryData = Category::withCount('products')
                                ->pluck('products_count')
                                ->toArray();

        return view('admin.home.index', [
            'productCount' => $productCount,
            'categoryCount' => $categoryCount,
            'subcategoryCount' => $subcategoryCount,
            'orderCount' => $orderCount,
            'totalRevenue' => $totalRevenue,
            'monthlyRevenue' => $monthlyRevenue,
            'pendingOrders' => $pendingOrders,
            'completedOrders' => $completedOrders,
            'categoryLabels' => $categoryLabels,
            'categoryData' => $categoryData,
        ]);
    }

    public function cacheClear()
    {
        Artisan::call('optimize:clear');
        return back()->with('success', 'Cache Cleared Successfully');
    }
}
