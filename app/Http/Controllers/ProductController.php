<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Product::select('id', 'slug', 'category_id', 'subcategory_id', 'title', 'description', 'image', 'old_price', 'new_price')->with(['category:id,name',
            'subcategory:id,name'])->get();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('category_id', function ($row) {
                    return $row->category ? $row->category->name : 'N/A';
                })
                ->addColumn('subcategory_id', function ($row) {
                    return $row->subcategory ? $row->subcategory->name : 'N/A';
                })
                ->addColumn('image', function ($row) {
                    return $row->image ? asset('storage/' . $row->image) : 'No Image';
                })
                ->addColumn('action-btn', function ($row) {
                    $data = [
                        'id' => $row->id,
                        'slug' => $row->slug
                    ];
                    return $data;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }

        return view('admin.products.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with('subcategories')->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products','public');
            $data['image'] = $path;
        }
        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    
    public function showDetails($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('admin.products.show', compact('product'));
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::with('subcategories')->get();
        $subcategories = SubCategory::all();
        return view('admin.products.edit', compact('product', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)){
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products','public');
        }
        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted');
    }


    public function getSubcategories($id)
    {
        $subcategories = SubCategory::where('category_id', $id)->select('id', 'name')->get();
        return response()->json($subcategories);
    }
}
