@extends('frontend.app')

@section('title')
    Home
@endsection

@section('content')
    <main class="overflow-hidden">
		<!-- home_area -->
		<section class="home_area">
			<div class="container">
				<div class="home_content">
					<h1>Zaman's <span>Agro</span></h1>
					<p class="lead">Premium dates sourced from trusted growers — Medjool, Ajwa, Deglet Noor and more, packed for freshness and shipped worldwide.</p>
					<div class="button_wrapper mt_40">
					<a href="{{ route('products') }}" class="button primary">
						<div class="btn_text splitedText">Shop Dates</div>
						<i class="ri-shopping-cart-2-line"></i>
					</a>
					<a href="{{ route('contact') }}" class="button white_outline">
							<div class="btn_text splitedText">Contact Us</div>
							<i class="ri-arrow-right-s-line"></i>
						</a>
					</div>
				</div>
			</div>
		</section>


		<!-- category_area -->
		<section class="category_area">
			<div class="container">
				<div class="category_carousel owl-carousel category-carousel">
					@foreach($categories as $category)
						<div class="category_item">
							<div class="cat_img">
                                <img src="{{ 'storage/' . $category->image }}" alt="{{ $category->name }}">
                            </div>
							<h5>{{ $category->name }}</h5>
						</div>
					@endforeach
				</div>
			</div>
		</section>

        <!-- featured_area -->
        <section class="featured_area">
            <div class="container">
                <div class="section_title">
                    <h2>Featured Products</h2>
                    <p class="section_sub">Hand-picked selections — customer favourites and limited batches.</p>
                </div>
				<div class="featured_nav" aria-hidden="true">
					<button class="feat_prev" aria-label="Previous"><i class="ri-arrow-left-s-line"></i></button>
					<button class="feat_next" aria-label="Next"><i class="ri-arrow-right-s-line"></i></button>
				</div>
                <div class="featured_carousel owl-carousel">
                    @foreach($featured as $product)
                        <div class="featured_card">
                            @if($product->tag)
                                <span class="ribbon">{{ ucfirst($product->tag) }}</span>
                            @endif
                            <div class="feat_img">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('frontend/img/products/default.jpg') }}" alt="{{ $product->title }}">
                            </div>
                            <div class="feat_meta">
                                <h5>{{ $product->title }}</h5>
                                @if($product->unit)
                                    <small class="text-muted d-block mb-2">
                                        <i class="ri-scales-3-line"></i> {{ $product->unit }}
                                    </small>
                                @endif
                                <div class="price">BDT {{ number_format($product->new_price, 0) }}</div>
                                <p class="feat_desc">{{ Str::limit($product->description, 60) }}</p>
                            </div>
                            <div class="feat_actions">
                                <a href="{{ route('product.details', $product->id) }}" class="button splitedText">Order Now</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- product_area -->
        <section class="product_area">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section_title">
							<h2>Our Products</h2>
							<p class="section_sub">Explore our premium date varieties — fresh, packed and ready to ship.</p>
						</div>
					</div>
				</div>
                <div class="row g-4">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product_card">
                                @if($product->tag)
                                    <div style="position: absolute; top: 10px; right: 10px; background: #B86B1F; color: white; padding: 0.3rem 0.6rem; border-radius: 0.3rem; font-size: 0.75rem; font-weight: 600; z-index: 10; text-transform: uppercase;">
                                        {{ $product->tag }}
                                    </div>
                                @endif
                                <div class="product_img"><img src="{{ $product->image ? asset('storage/' . $product->image) : asset('frontend/img/products/default.jpg') }}" alt="{{ $product->title }}"></div>
                                <div class="product_info">
                                    <div class="product_meta">
                                        <h5>{{ $product->title }}</h5>
                                    </div>
                                    @if($product->unit)
                                        <small class="text-muted d-block mb-2" style="font-size: 0.85rem;">
                                            <i class="ri-scales-3-line"></i> {{ $product->unit }}
                                        </small>
                                    @endif
                                    <div class="price">BDT {{ number_format($product->new_price, 0) }}</div>
                                </div>
                                <div class="product_subwrap">
                                    <p class="product_sub">{{ Str::limit($product->description, 80) }}</p>
                                </div>
                                <div class="product_overlay">
                                    <a href="{{ route('product.details', $product->id) }}" class="button primary">
                                        <div class="btn_text">View Details</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
				<div class="row">
					<div class="col-12 text-center product_cta">
					<a href="{{ route('products') }}" class="button splitedText">Show more</a>
					</div>
				</div>
			</div>
		</section>

        
		<!-- order_info_area -->
		<section class="order_info_area">
			<div class="container">
				<div class="section_title">
					<h2>How To Order</h2>
					<p class="section_sub">Simple steps to get premium dates delivered to your door.</p>
				</div>
				<div class="row g-4 order_steps">
					<div class="col-md-4">
						<div class="step_card text-center">
							<div class="step_icon"><i class="ri-shopping-cart-2-line"></i></div>
							<h5>Choose Products</h5>
							<p class="muted">Browse our selection and add items to your cart.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="step_card text-center">
							<div class="step_icon"><i class="ri-wallet-3-line"></i></div>
							<h5>Secure Payment</h5>
							<p class="muted">Pay online securely or choose cash on delivery.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="step_card text-center">
							<div class="step_icon"><i class="ri-truck-line"></i></div>
							<h5>Fast Delivery</h5>
							<p class="muted">We ship quickly with tracking and care-packed boxes.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

	</main>
@endsection
