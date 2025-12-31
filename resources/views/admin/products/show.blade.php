@extends('admin.app')
@section('title', 'Product Details')

@section('content')
<div class="container-fluid my-4">
    <div class="card table-card">
        <div class="card-header table-header">
            <div class="table-title">Product Details</div>
            <a href="{{ route('products.index') }}" class="btn add-new">Back to Products</a>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <strong>Title:</strong> {{ $product->title }}
                </div>
                <div class="col-md-6">
                    <strong>Category:</strong> {{ $product->category->name ?? '-' }}
                </div>
                <div class="col-md-6">
                    <strong>Subcategory:</strong> {{ $product->subcategory->name ?? '-' }}
                </div>
                <div class="col-md-6">
                    <strong>Old Price:</strong> {{ $product->old_price ?? '-' }}
                </div>
                <div class="col-md-6">
                    <strong>New Price:</strong> {{ $product->new_price }}
                </div>
                <div class="col-md-6">
                    <strong>Slug:</strong> {{ $product->slug }}
                </div>
                <div class="col-12">
                    <strong>Description:</strong>
                    <p>{{ $product->description ?? '-' }}</p>
                </div>
                <div class="col-12">
                    <strong>Image:</strong><br>
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default.jpg') }}" alt="{{ $product->title }}" class="img-fluid" style="max-width:300px;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
