@extends('admin.app')
@section('title', 'Product Details')

@section('content')
<div class="container-fluid my-4">
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
        </ol>
    </nav>

    <div class="row g-4">
        {{-- Product Images Section --}}
        <div class="col-lg-6">
            <div class="card table-card sticky-top" style="top: 20px;">
                <div class="card-body p-0">
                    {{-- Main Product Image --}}
                    <div class="product-image-container mb-3">
                        <img id="mainImage" 
                            src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default.jpg') }}" 
                            alt="{{ $product->title }}" 
                            class="img-fluid rounded-top"
                            style="width: 100%; height: 400px; object-fit: cover;">
                    </div>

                    {{-- Gallery Images --}}
                    @if($product->images->count() > 0)
                        <div class="p-3 border-top">
                            <h6 class="mb-3">
                                <i class="ri-images-line me-2"></i>
                                Product Gallery
                                <span class="badge bg-primary">{{ $product->images->count() }}</span>
                            </h6>
                            <div class="gallery-thumbnails">
                                @foreach($product->images as $index => $image)
                                    <div class="gallery-thumbnail" onclick="changeMainImage(this)">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" 
                                            alt="Gallery Image {{ $index + 1 }}"
                                            data-full="{{ asset('storage/' . $image->image_path) }}"
                                            class="img-fluid rounded {{ $index === 0 ? 'active' : '' }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Product Details Section --}}
        <div class="col-lg-6">
            {{-- Product Title & Category --}}
            <div class="card table-card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h3 class="mb-2">{{ $product->title }}</h3>
                            <div>
                                <span class="badge bg-info">
                                    <i class="ri-folder-line me-1"></i>
                                    {{ $product->category->name ?? 'No Category' }}
                                </span>
                            </div>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">Slug</small>
                            <p class="mb-0" style="font-size: 12px; word-break: break-all;">
                                {{ $product->slug }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pricing Section --}}
            <div class="card table-card mb-3">
                <div class="card-body">
                    <h5 class="mb-3">
                        <i class="ri-price-tag-3-line me-2"></i>
                        Pricing
                    </h5>
                    <div class="row g-3">
                        @if($product->old_price)
                            <div class="col-md-6">
                                <div class="price-box old-price-box">
                                    <small class="text-muted">Original Price</small>
                                    <h5 class="text-danger text-decoration-line-through">
                                        @if(config('app.currency_symbol'))
                                            {{ config('app.currency_symbol') }}{{ number_format($product->old_price, 2) }}
                                        @else
                                            ${{ number_format($product->old_price, 2) }}
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <div class="price-box current-price-box">
                                <small class="text-muted">Current Price</small>
                                <h4 class="text-success fw-bold">
                                    @if(config('app.currency_symbol'))
                                        {{ config('app.currency_symbol') }}{{ number_format($product->new_price, 2) }}
                                    @else
                                        ${{ number_format($product->new_price, 2) }}
                                    @endif
                                </h4>
                            </div>
                        </div>
                        @if($product->old_price)
                            <div class="col-12">
                                <div class="alert alert-success mb-0">
                                    <small>
                                        <i class="ri-discount-percent-line"></i>
                                        Discount: 
                                        <strong>
                                            {{ round((($product->old_price - $product->new_price) / $product->old_price) * 100) }}%
                                        </strong>
                                    </small>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Description Section --}}
            @if($product->description)
                <div class="card table-card mb-3">
                    <div class="card-body">
                        <h5 class="mb-3">
                            <i class="ri-file-text-line me-2"></i>
                            Description
                        </h5>
                        <div class="description-content">
                            {{ $product->description }}
                        </div>
                    </div>
                </div>
            @endif

            {{-- Product Info --}}
            <div class="card table-card">
                <div class="card-body">
                    <h5 class="mb-3">
                        <i class="ri-information-line me-2"></i>
                        Product Information
                    </h5>
                    <table class="table table-sm mb-0">
                        <tbody>
                            <tr>
                                <td><strong>Product ID:</strong></td>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Created:</strong></td>
                                <td>{{ $product->created_at->format('M d, Y h:i A') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Updated:</strong></td>
                                <td>{{ $product->updated_at->format('M d, Y h:i A') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Total Images:</strong></td>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ $product->images->count() + ($product->image ? 1 : 0) }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary flex-grow-1">
                    <i class="ri-edit-line me-2"></i>Edit Product
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary flex-grow-1">
                    <i class="ri-arrow-left-line me-2"></i>Back to Products
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .product-image-container {
        background: #f8f9fa;
        border-radius: 8px;
        overflow: hidden;
    }

    .gallery-thumbnails {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
        gap: 12px;
    }

    .gallery-thumbnail {
        cursor: pointer;
        border-radius: 6px;
        overflow: hidden;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .gallery-thumbnail:hover img {
        transform: scale(1.1);
    }

    .gallery-thumbnail img {
        width: 100%;
        height: 80px;
        object-fit: cover;
        display: block;
        transition: all 0.3s ease;
    }

    .gallery-thumbnail img.active {
        border-color: #007bff;
        box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
    }

    .price-box {
        padding: 15px;
        border-radius: 8px;
        background: #f8f9fa;
    }

    .old-price-box {
        border-left: 4px solid #dc3545;
    }

    .current-price-box {
        border-left: 4px solid #198754;
        background: rgba(25, 135, 84, 0.05);
    }

    .description-content {
        line-height: 1.6;
        color: #555;
        white-space: pre-wrap;
        word-wrap: break-word;
    }

    .card-body h5 {
        font-weight: 600;
        color: #333;
    }

    .sticky-top {
        z-index: 10;
    }

    @media (max-width: 991px) {
        .sticky-top {
            position: static;
        }

        .gallery-thumbnails {
            grid-template-columns: repeat(auto-fill, minmax(60px, 1fr));
        }

        .gallery-thumbnail img {
            height: 60px;
        }
    }

    .breadcrumb {
        background-color: transparent;
        padding: 0;
    }

    .table-sm td {
        padding: 0.5rem;
        vertical-align: middle;
    }

    .btn {
        border-radius: 6px;
        font-weight: 500;
    }
</style>

<script>
    function changeMainImage(thumbnail) {
        const mainImage = document.getElementById('mainImage');
        const fullImageSrc = thumbnail.querySelector('img').dataset.full;
        
        // Update main image
        mainImage.src = fullImageSrc;
        
        // Update active state
        document.querySelectorAll('.gallery-thumbnail img').forEach(img => {
            img.classList.remove('active');
        });
        thumbnail.querySelector('img').classList.add('active');
    }
</script>
@endsection
