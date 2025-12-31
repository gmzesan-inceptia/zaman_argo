<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
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
            $query = Product::select('id', 'slug', 'category_id', 'title', 'description', 'image', 'old_price', 'new_price')->with(['category:id,name'])->get();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('category_id', function ($row) {
                    return $row->category ? $row->category->name : 'N/A';
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
        $categories = Category::all();
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
        $product = Product::create($data);

        // Handle multiple product images
        if ($request->hasFile('images') && count($request->file('images')) > 0) {
            foreach ($request->file('images') as $image) {
                // Skip null or empty files
                if (is_null($image)) {
                    continue;
                }
                
                $imagePath = $image->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

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
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
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

        // Handle multiple product images
        if ($request->hasFile('images')) {
            // Delete old images
            foreach ($product->images as $productImage) {
                if (Storage::disk('public')->exists($productImage->image_path)) {
                    Storage::disk('public')->delete($productImage->image_path);
                }
                $productImage->delete();
            }

            // Add new images
            $images = $request->file('images');
            foreach ($images as $index => $image) {
                if ($image !== null && is_object($image)) {
                    $imagePath = $image->store('products', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $imagePath,
                    ]);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Product updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete thumbnail image if exists
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        // Delete all gallery images
        foreach ($product->images as $productImage) {
            if (Storage::disk('public')->exists($productImage->image_path)) {
                Storage::disk('public')->delete($productImage->image_path);
            }
            $productImage->delete();
        }

        // Delete the product
        $product->delete();
        return back()->with('success', 'Product deleted');
    }
}
