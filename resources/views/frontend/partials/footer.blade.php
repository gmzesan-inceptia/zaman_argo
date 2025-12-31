<footer>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-3 col-sm-6 mt_25 fade-up">
                <a href="{{ route('home') }}" class="footer_logo">
                    <img src="/frontend/img/logo.png" class="w-100" alt="Zaman's Agro logo">
                </a>
                <p>Zaman's Agro supplies premium dates sourced from trusted growers. We specialise in Medjool, Deglet
                    Noor, Ajwa and other popular varieties, packed for quality and freshness.</p>
            </div>
            <div class="col-lg-3 col-sm-6 mt_50 fade-up">
                <h4><span>Address</span></h4>
                <p><strong>Office Address:</strong><br> Block D, Road 2, Aftabnagar, Dhaka</p>
                <p>
                    <strong>E:</strong><a href="mailto:riazulislamabir99@gmail.com"> riazulislamabir99@gmail.com</a><br>
                    <strong>T:</strong><a href="tel:+8801622374228"> +880 1622-374228</a>
                </p>
                <div class="social_icons mt_40">
                    <a href="#" target="_blank"><i class="ri-instagram-line"></i></a>
                    <a href="#" target="_blank"><i class="ri-linkedin-fill"></i></a>
                    <a href="#" target="_blank"><i class="ri-tiktok-fill"></i></a>
                    <a href="#" target="_blank"><i class="ri-facebook-fill"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-6 mt_50 fade-up">
                <h4><span>Quick Links</span></h4>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('products') }}">Products</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-6 mt_50 fade-up">
                <h4><span>Products</span></h4>
                <ul>
                    @foreach($headerCategories as $category)
                        <li><a href="{{ route('products', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="row justify-content-center justify-content-lg-between align-items-center">
                <div class="col-lg-6">
                    © 2025 <a href="#" target="_blank">Zaman's Agro</a>. All rights reserved.
                </div>
                <div class="col-lg-3">
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
