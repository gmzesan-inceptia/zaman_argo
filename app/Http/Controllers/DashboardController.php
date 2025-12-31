<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $subcategoryCount = SubCategory::count();
        $productCount = Product::count();


        return view('admin.home.index', [
            'productCount' => $productCount,
            'categoryCount' => $categoryCount,
            'subcategoryCount' => $subcategoryCount,
        ]);
    }

    public function cacheClear()
    {
        Artisan::call('optimize:clear');
        return back()->with('success', 'Cache Cleared Successfully');
    }
}
