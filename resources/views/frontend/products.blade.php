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
                    <div class="filter_bar">
                        <div class="input-group">
                            <span class="input-group-text"><i class="ri-search-line"></i></span>
                            <input type="text" class="form-control" id="searchInput" placeholder="Search products...">
                        </div>
                        <div class="select-wrap">
                            <select class="form-select" id="filterCategory">
                                <option value="all">All Categories</option>
                                <option value="medjool">Medjool</option>
                                <option value="ajwa">Ajwa</option>
                                <option value="segai">Segai</option>
                                <option value="sokkari">Sokkari</option>
                            </select>
                        </div>
                        <div class="select-wrap">
                            <select class="form-select" id="sortSelect">
                                <option value="default">Sort by</option>
                                <option value="price-asc">Price: Low to High</option>
                                <option value="price-desc">Price: High to Low</option>
                            </select>
                        </div>
                        <button class="btn-clear" id="clearFiltersBtn"><i class="ri-refresh-line"></i> Clear</button>
                    </div>
                    <div class="filter-chips" id="filterChips">
                        <div class="chip" data-category="medjool">Medjool <span class="count">0</span></div>
                        <div class="chip" data-category="ajwa">Ajwa <span class="count">0</span></div>
                        <div class="chip" data-category="segai">Segai <span class="count">0</span></div>
                        <div class="chip" data-category="sokkari">Sokkari <span class="count">0</span></div>
                    </div>
                </div>



                <div class="row g-4" id="productsGrid">
                    <!-- add data attributes for simple JS filtering -->
                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="medjool" data-price="450">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Medjool.jpg" alt="Medjool Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Medjool Dates</h5>
                                </div>
                                <div class="price">BDT 450</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Soft, caramel-like and naturally sweet.</p>
                            </div>
                            <div class="product_overlay">
                                <a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="ajwa" data-price="520">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Ajwa.jpg" alt="Ajwa Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Ajwa Dates</h5>
                                </div>
                                <div class="price">BDT 520</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Rich, mildly chewy and prized for flavor.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="segai" data-price="380">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Segai.jpg" alt="Segai Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Segai Dates</h5>
                                </div>
                                <div class="price">BDT 380</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Chewy texture with a delicate honey note.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="sokkari" data-price="430">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Sokari.jpg" alt="Sokari Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Sokari Dates</h5>
                                </div>
                                <div class="price">BDT 430</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Buttery, sweet and excellent for snacking.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>
                    <!-- add data attributes for simple JS filtering -->
                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="medjool" data-price="450">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Medjool.jpg" alt="Medjool Dates">
                            </div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Medjool Dates</h5>
                                </div>
                                <div class="price">BDT 450</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Soft, caramel-like and naturally sweet.</p>
                            </div>
                            <div class="product_overlay">
                                <a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="ajwa" data-price="520">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Ajwa.jpg" alt="Ajwa Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Ajwa Dates</h5>
                                </div>
                                <div class="price">BDT 520</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Rich, mildly chewy and prized for flavor.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="segai" data-price="380">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Segai.jpg" alt="Segai Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Segai Dates</h5>
                                </div>
                                <div class="price">BDT 380</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Chewy texture with a delicate honey note.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="sokkari" data-price="430">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Sokari.jpg" alt="Sokari Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Sokari Dates</h5>
                                </div>
                                <div class="price">BDT 430</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Buttery, sweet and excellent for snacking.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>
                    <!-- add data attributes for simple JS filtering -->
                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="medjool" data-price="450">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Medjool.jpg" alt="Medjool Dates">
                            </div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Medjool Dates</h5>
                                </div>
                                <div class="price">BDT 450</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Soft, caramel-like and naturally sweet.</p>
                            </div>
                            <div class="product_overlay">
                                <a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="ajwa" data-price="520">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Ajwa.jpg" alt="Ajwa Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Ajwa Dates</h5>
                                </div>
                                <div class="price">BDT 520</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Rich, mildly chewy and prized for flavor.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="segai" data-price="380">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Segai.jpg" alt="Segai Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Segai Dates</h5>
                                </div>
                                <div class="price">BDT 380</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Chewy texture with a delicate honey note.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="sokkari" data-price="430">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Sokari.jpg" alt="Sokari Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Sokari Dates</h5>
                                </div>
                                <div class="price">BDT 430</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Buttery, sweet and excellent for snacking.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>
                    <!-- add data attributes for simple JS filtering -->
                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="medjool" data-price="450">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Medjool.jpg" alt="Medjool Dates">
                            </div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Medjool Dates</h5>
                                </div>
                                <div class="price">BDT 450</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Soft, caramel-like and naturally sweet.</p>
                            </div>
                            <div class="product_overlay">
                                <a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="ajwa" data-price="520">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Ajwa.jpg" alt="Ajwa Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Ajwa Dates</h5>
                                </div>
                                <div class="price">BDT 520</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Rich, mildly chewy and prized for flavor.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="segai" data-price="380">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Segai.jpg" alt="Segai Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Segai Dates</h5>
                                </div>
                                <div class="price">BDT 380</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Chewy texture with a delicate honey note.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="sokkari" data-price="430">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Sokari.jpg" alt="Sokari Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Sokari Dates</h5>
                                </div>
                                <div class="price">BDT 430</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Buttery, sweet and excellent for snacking.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>
                    <!-- add data attributes for simple JS filtering -->
                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="medjool" data-price="450">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Medjool.jpg" alt="Medjool Dates">
                            </div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Medjool Dates</h5>
                                </div>
                                <div class="price">BDT 450</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Soft, caramel-like and naturally sweet.</p>
                            </div>
                            <div class="product_overlay">
                                <a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="ajwa" data-price="520">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Ajwa.jpg" alt="Ajwa Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Ajwa Dates</h5>
                                </div>
                                <div class="price">BDT 520</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Rich, mildly chewy and prized for flavor.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="segai" data-price="380">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Segai.jpg" alt="Segai Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Segai Dates</h5>
                                </div>
                                <div class="price">BDT 380</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Chewy texture with a delicate honey note.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6" data-category="sokkari" data-price="430">
                        <div class="product_card">
                            <div class="product_img"><img src="/frontend/img/products/Sokari.jpg" alt="Sokari Dates"></div>
                            <div class="product_info">
                                <div class="product_meta">
                                    <h5>Sokari Dates</h5>
                                </div>
                                <div class="price">BDT 430</div>
                            </div>
                            <div class="product_subwrap">
                                <p class="product_sub">Buttery, sweet and excellent for snacking.</p>
                            </div>
                            <div class="product_overlay"><a href="{{ route('product.details') }}" class="button primary">
                                    <div class="btn_text">View Details</div>
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
