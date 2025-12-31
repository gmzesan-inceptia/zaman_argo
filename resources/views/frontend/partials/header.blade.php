<header>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <!--logo start-->
            <a href="{{ route('home') }}" class="logo_wrap">
                <img src="/frontend/img/logo.png" class="w-100 logo" alt="">
            </a>
            <div class="header_menu">
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li class="dropdown_wrap">
                            <a href="{{ route('products') }}">Products</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('products') }}">Medjool Dates</a></li>
                                <li><a href="{{ route('products') }}">Deglet Noor</a></li>
                                <li><a href="{{ route('products') }}">Ajwa Dates</a></li>
                                <li><a href="{{ route('products') }}">Sukkari Dates</a></li>
                                <li><a href="{{ route('products') }}">Khalas Dates</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                <div class="header_cta">
                    <a href="{{ route('contact') }}" class="button theme_outline">
                        <div class="btn_text splitedText">Contact Us</div>
                    </a>
                </div>

                <!-- menu toggle -->
                <div class="menu_toggle">
                    <svg viewBox="0 0 50 50" width="50" height="50">
                        <circle r="25" cx="25" cy="25"></circle>
                    </svg>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <!-- full menu -->
    <div class="full_menu">
        <div class="scrollable_menu">
            <div class="menu_inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="menu_list">
                                <div class="row">
                                    <div class="col-sm-6 menu_list_wrap">
                                        <ul>
                                            <li><a href="{{ route('home') }}">Home</a></li>
                                            <li><a href="{{ route('about') }}">About Us</a></li>
                                            <li><a href="{{ route('products') }}">Products</a></li>
                                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 menu_img">
                                        <img src="/frontend/img/products/Ajwa.jpg" class="w-100" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-none d-lg-block">
                            <div class="menu_right_col animation_right_col">
                                <div class="h4">Zaman's Agro</div>
                                <p><strong>Shop Address:</strong><br> Block D, Road 2, Aftabnagar, Dhaka</p>
                                <p><strong>Email:</strong><br> <a
                                        href="mailto:riazulislamabir99@gmail.com">riazulislamabir99@gmail.com</a></p>
                                <p><strong>Phone:</strong><br> <a href="tel:+8801622374228">+880 1622-374228</a></p>
                                <div class="social_icons mt_20">
                                    <a href="#" target="_blank"><i class="ri-instagram-line"></i></a>
                                    <a href="#" target="_blank"><i class="ri-linkedin-fill"></i></a>
                                    <a href="#" target="_blank"><i class="ri-tiktok-fill"></i></a>
                                    <a href="#" target="_blank"><i class="ri-facebook-fill"></i></a>
                                </div>
                                <div class="rotate_circle">
                                    <img src="/frontend/img/get.png" alt="">
                                    <h4><span>LET'S MEET</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
