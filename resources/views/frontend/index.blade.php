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
					<div class="category_item">
						<div class="cat_img"><img src="/frontend/img/category/ajwa.png" alt="Dates"></div>
						<h5>Dates</h5>
					</div>
					<div class="category_item">
						<div class="cat_img"><img src="/frontend/img/category/ghee.png" alt="Ghee"></div>
						<h5>Ghee</h5>
					</div>
					<div class="category_item">
						<div class="cat_img"><img src="/frontend/img/category/herbs.png" alt="Herbs"></div>
						<h5>Herbs</h5>
					</div>
					<div class="category_item">
						<div class="cat_img"><img src="/frontend/img/category/honey.png" alt="Honey"></div>
						<h5>Honey</h5>
					</div>
					<div class="category_item">
						<div class="cat_img"><img src="/frontend/img/category/nuts.png" alt="Nuts"></div>
						<h5>Nuts</h5>
					</div>
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
                    <div class="featured_card">
                        <span class="ribbon">Featured</span>
                        <div class="feat_img">
                            <img src="/frontend/img/products/Medjool.jpg" alt="Medjool">
                        </div>
                        <div class="feat_meta">
                            <h5>Medjool Dates</h5>
                            <div class="price">BDT 450</div>
                            <p class="feat_desc">Soft, caramel-like and naturally sweet — ideal for gifting.</p>
                        </div>
                        <div class="feat_actions">
                            <a href="{{ route('product.details') }}" class="button splitedText">Order Now</a>
                        </div>
                    </div>
                    <div class="featured_card">
                        <span class="ribbon">Limited</span>
                        <div class="feat_img">
                            <img src="/frontend/img/products/Ajwa.jpg" alt="Ajwa">
                        </div>
                        <div class="feat_meta">
                            <h5>Ajwa Dates</h5>
                            <div class="price">BDT 520</div>
                            <p class="feat_desc">Rich and prized for heritage flavour and texture.</p>
                        </div>
                        <div class="feat_actions">
                            <a href="{{ route('product.details') }}" class="button splitedText">Order Now</a>
                        </div>
                    </div>
                    <div class="featured_card">
                        <span class="ribbon">Popular</span>
                        <div class="feat_img">
                            <img src="/frontend/img/products/Segai.jpg" alt="Segai">
                        </div>
                        <div class="feat_meta">
                            <h5>Segai Dates</h5>
                            <div class="price">BDT 380</div>
                            <p class="feat_desc">Chewy texture with a delicate honey note.</p>
                        </div>
                        <div class="feat_actions">
                            <a href="{{ route('product.details') }}" class="button splitedText">Order Now</a>
                        </div>
                    </div>
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
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Medjool.jpg" alt="Medjool Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Medjool Dates</h5>
                                </div>
                                <div class="price">BDT 450</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Soft, caramel-like and naturally sweet. Packed for freshness &amp; quick delivery.</p>
                            </div>
                            <div class="product_overlay">
                                <a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Ajwa.jpg" alt="Ajwa Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Ajwa Dates</h5>
                                </div>
                                <div class="price">BDT 520</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Rich, mildly chewy and prized for flavor. Packed for freshness &amp; quick delivery.</p>
                            </div>
                            <div class="product_overlay">
                                <a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Segai.jpg" alt="Segai Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Segai Dates</h5>
                                </div>
                                <div class="price">BDT 380</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Chewy texture with a delicate honey note. Packed for freshness &amp; quick delivery.</p>
                            </div>
                            <div class="product_overlay">
                                <a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Sokari.jpg" alt="Sokari Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Sokari Dates</h5>
                                </div>
                                <div class="price">BDT 430</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Buttery, sweet and excellent for snacking. Packed for freshness &amp; quick delivery.</p>
                            </div>
                            <div class="product_overlay">
                                <a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Kholas.jpg" alt="Khalas Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Kholas Dates</h5>
                                </div>
                                <div class="price">BDT 400</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Classic, tender with a subtle caramel finish. Packed for freshness &amp; quick delivery.</p>
                            </div>
                            <div class="product_overlay">
                                <a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Wanan.jpg" alt="Wanan Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Wanan Dates</h5>
                                </div>
                                <div class="price">BDT 620</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Premium, large-sized with jammy sweetness. Packed for freshness &amp; quick delivery.</p>
                            </div>
                            <div class="product_overlay">
                                <a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a>
                            </div>
                        </div>
                    </div>
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
