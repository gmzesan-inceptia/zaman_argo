<footer>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-3 col-sm-6 mt_25">
                <a href="{{ route('home') }}" class="footer_logo">
                    <img src="/frontend/img/logo.png" class="w-100" alt="Zaman's Agro logo">
                </a>
                <p>Pure, fresh, and organic foods—free from chemical mixing, made for your well-being.</p>
            </div>
            <div class="col-lg-3 col-sm-6 mt_50">
                <h4><span>Address</span></h4>
                <p><strong>Office Address:</strong><br> Block D, Road 2, Aftabnagar, Dhaka</p>
                <p>
                    <strong>E:</strong><a href="mailto:darkdestroyer9970@gmail.com"> darkdestroyer9970@gmail.com</a><br>
                    <strong>T:</strong><a href="tel:+8801887556868"> +8801887556868</a>
                </p>
                <div class="social_icons mt_40">
                    <a href="https://www.instagram.com/zamansagro/" target="_blank"><i class="ri-instagram-line"></i></a>
                    <a href="https://wa.me/8801887556868" target="_blank"><i class="ri-whatsapp-fill"></i></a>
                    <a href="https://www.tiktok.com/@zamansagro?lang=en-GB" target="_blank"><i class="ri-tiktok-fill"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=61584491076754" target="_blank"><i class="ri-facebook-fill"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-6 mt_50">
                <h4><span>Quick Links</span></h4>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('products') }}">Products</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-6 mt_50">
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
