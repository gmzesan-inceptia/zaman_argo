@extends('frontend.app')

@section('title')
    Products
@endsection

@push('styles')
    <link href="{{ asset('frontend/css/products.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <main class="overflow-hidden">

        <!-- Hero -->
        <section class="product-hero">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center py-4">
                    <div>
                        <h1 class="h2 mb-1">Our Products</h1>
                        <p class="mb-0 text-muted">Premium dates — browse by variety, weight and price</p>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>


        <!-- Products grid -->
        <section class="product_area sec_pad bg_gray">
            <div class="container">

                <!-- filter bar -->
                <div
                    class="product-filter d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                    <form method="GET" action="{{ route('products') }}" id="filterForm" class="filter_bar">
                        <div class="input-group">
                            <span class="input-group-text"><i class="ri-search-line"></i></span>
                            <input type="text" class="form-control" id="searchInput" name="search" placeholder="Search products..." value="{{ request('search') }}">
                        </div>
                        <div class="select-wrap">
                            <select class="form-select" id="filterCategory" name="category" onchange="document.getElementById('filterForm').submit()">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="select-wrap">
                            <select class="form-select" id="sortSelect" name="sort" onchange="document.getElementById('filterForm').submit()">
                                <option value="">Sort by</option>
                                <option value="price-asc" {{ request('sort') == 'price-asc' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>Price: High to Low</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-clear"><i class="ri-refresh-line"></i> Search</button>
                        @if(request('search') || request('category') || request('sort'))
                            <a href="{{ route('products') }}" class="btn-clear"><i class="ri-close-line"></i> Clear</a>
                        @endif
                    </form>
                </div>



                <div class="row g-4" id="productsGrid">
                    @forelse($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6" data-category="{{ $product->category->id ?? '' }}" data-price="{{ $product->new_price ?? 0 }}">
                            <div class="product_card">
                                <div class="product_img">
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('frontend/img/placeholder.jpg') }}" alt="{{ $product->title }}">
                                </div>
                                <div class="product_info">
                                    <div class="product_meta">
                                        <h5>{{ $product->title }}</h5>
                                    </div>
                                    <div class="price">BDT {{ number_format($product->new_price, 0) }}</div>
                                </div>
                                <div class="product_subwrap">
                                    <p class="product_sub">{{ Str::limit($product->description, 50) }}</p>
                                </div>
                                <div class="product_overlay">
                                    <a href="{{ route('product.details', $product->id) }}" class="button primary">
                                        <div class="btn_text">View Details</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center" role="alert">
                                <i class="ri-search-line"></i> No products found matching your criteria.
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($products->count() > 0)
                    <div class="row mt-5">
                        <div class="col-12">
                            {{ $products->links('pagination.custom') }}
                        </div>
                    </div>
                @endif
            </div>
        </section>

    </main>
@endsection
