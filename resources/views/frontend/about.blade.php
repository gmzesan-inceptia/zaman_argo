@extends('frontend.app')

@section('title') About Us @endsection

@section('content')
    <main class="overflow-hidden">
		<!-- hero/banner -->
		<div class="banner_area inner_banner">
            <div class="banner_img" style="background-image: url(/frontend/img/home_bg.jpeg);"></div>
                <div class="container">
                    <div class="banner_left parallax-fast parallax-content">
                        <h1>About Zaman's <span>Agro</span></h1>
                        <p class="lead">We source, pack and deliver premium dates with care — from trusted growers to your table.</p>
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
		</div>

		<!-- about content (enhanced) -->
		<section class="about_area sec_pad">
			<div class="container">
				<div class="row align-items-center g-5">
					<div class="col-lg-6 fade-up">
						<div class="section_title">
							<h2>Our Story</h2>
							<p class="section_sub">From careful sourcing to gentle packing, our commitment is freshness and flavour.</p>
						</div>
						<p class="mt_30">Zaman's Agro began with a simple aim: bring high-quality dates to customers who value taste and provenance. We work directly with growers, apply strict quality checks, and pack products in hygienic facilities to preserve their natural flavour and texture.</p>
						<p class="mt_20">Whether you are buying for personal use, gifting, or retail, our focus is consistent — premium produce, transparent sourcing and reliable delivery.</p>

						<div class="d-flex flex-wrap gap-3 mt_30">
							<div style="min-width:12rem;padding:1.4rem;border-radius:.8rem;background:#fff;box-shadow:0 10px 30px rgba(6,12,20,0.04);">
								<div class="h4" style="color:var(--theme);font-size:2.6rem;margin-bottom:.4rem">100k+</div>
								<div class="muted">Satisfied customers</div>
							</div>
							<div style="min-width:12rem;padding:1.4rem;border-radius:.8rem;background:linear-gradient(180deg,#fff,#fff);border: .1rem solid rgba(184,107,31,0.06);box-shadow:0 8px 22px rgba(6,12,20,0.03);">
								<div class="h4" style="color:var(--theme);font-size:2.6rem;margin-bottom:.4rem">10+</div>
								<div class="muted">Years sourcing</div>
							</div>
							<div style="min-width:12rem;padding:1.4rem;border-radius:.8rem;background:linear-gradient(180deg,rgba(248,243,240,1),#fff);box-shadow:0 8px 22px rgba(6,12,20,0.03);">
								<div class="h4" style="color:var(--theme);font-size:2.6rem;margin-bottom:.4rem">50+</div>
								<div class="muted">Grower partners</div>
							</div>
						</div>

						<blockquote style="background:linear-gradient(90deg, rgba(184,107,31,0.06), rgba(255,255,255,0.95)); padding:1.6rem; border-radius:.8rem; margin-top:2rem; box-shadow:0 8px 24px rgba(6,12,20,0.04);">
							<p style="font-size:1.8rem; font-weight:600; margin:0;">“We believe great taste starts with care — of people, soil and process.”</p>
							<small class="muted">— Founder, Zaman's Agro</small>
						</blockquote>

						<div class="mt_30">
							<a href="{{ route('products') }}" class="button primary"><div class="btn_text splitedText">Browse Products</div></a>
							<a href="{{ route('contact') }}" class="button white_outline" style="margin-left:1rem"><div class="btn_text splitedText">Request Samples</div></a>
						</div>
					</div>
					<div class="col-lg-6 fade-up">
						<div style="position:relative;">
							<img src="/frontend/img/products/Ajwa.jpg" alt="Our facility" class="w-100" style="border-radius:.8rem; box-shadow:0 12px 36px rgba(6,12,20,0.08);">
							<div style="position:absolute; left:2rem; bottom:2rem; background:rgba(255,255,255,0.98); padding:1.4rem; border-radius:.8rem; box-shadow:0 12px 30px rgba(6,12,20,0.06); max-width:66%;">
								<div style="font-size:1.4rem;color:var(--theme);font-weight:700;">Our Mission</div>
								<p class="muted" style="margin:0.4rem 0 0 0;">Deliver natural, premium dates with transparency and care — from farm to table.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- values / benefits (enhanced cards) -->
				<div class="row mt_60 g-4">
					<div class="col-md-4 fade-up">
						<div style="background: linear-gradient(180deg, rgba(184,107,31,0.06), rgba(255,255,255,0.6)); border-radius:.8rem; padding:2.4rem; text-align:center; box-shadow:0 12px 32px rgba(6,12,20,0.06); height:100%;">
							<div style="width:6.4rem;height:6.4rem;margin:0 auto;border-radius:50%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#B86B1F,#8f4f12);color:#fff;font-size:2.8rem;box-shadow:0 8px 20px rgba(184,107,31,0.18);">
								<i class="ri-checkbox-circle-line"></i>
							</div>
							<h5 class="mt_20">Quality Sourcing</h5>
							<p class="muted mt_15">Direct partnerships with trusted growers ensure traceability and premium quality in every batch.</p>
						</div>
					</div>
					<div class="col-md-4 fade-up">
						<div style="background: #fff; border-radius:.8rem; padding:2.4rem; text-align:center; box-shadow:0 12px 32px rgba(6,12,20,0.04); height:100%; border: .1rem solid rgba(184,107,31,0.06);">
							<div style="width:6.4rem;height:6.4rem;margin:0 auto;border-radius:50%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#F5E6D8,#FEEBD5);color:var(--theme);font-size:2.6rem;box-shadow:0 8px 20px rgba(184,107,31,0.08);">
								<i class="ri-leaf-line"></i>
							</div>
							<h5 class="mt_20">Fresh Packing</h5>
							<p class="muted mt_15">Hygienic, temperature-aware packing preserves natural texture, taste and shelf-life.</p>
						</div>
					</div>
					<div class="col-md-4 fade-up">
						<div style="background: linear-gradient(180deg, rgba(24,28,30,0.02), rgba(255,255,255,0.98)); border-radius:.8rem; padding:2.4rem; text-align:center; box-shadow:0 12px 32px rgba(6,12,20,0.04); height:100%;">
							<div style="width:6.4rem;height:6.4rem;margin:0 auto;border-radius:50%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#D9A06B,#B86B1F);color:#fff;font-size:2.6rem;box-shadow:0 8px 20px rgba(184,107,31,0.12);">
								<i class="ri-truck-line"></i>
							</div>
							<h5 class="mt_20">Trusted Delivery</h5>
							<p class="muted mt_15">Reliable logistics with tracking for domestic and international orders — on-time, every time.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- team / contact CTA (enhanced) -->
		<section class="pb_100">
			<div class="container">
				<div style="background: linear-gradient(180deg, rgba(184,107,31,0.06), rgba(255,255,255,0.95)); padding:5rem; border-radius:.8rem; box-shadow:0 18px 48px rgba(6,12,20,0.06);">
					<div class="row align-items-center">
						<div class="col-md-7">
							<h3 style="font-size:2.8rem; margin-bottom:.6rem">Have a project or order?</h3>
							<p class="muted" style="font-size:1.6rem; max-width:60rem">Wholesale, bulk orders or product questions — our dedicated team responds quickly. Tell us what you need and we'll help with pricing, samples and delivery options.</p>
							<div class="mt_30">
							<a href="{{ route('products') }}" class="button primary"><div class="btn_text splitedText">Browse Products</div></a>
							<a href="{{ route('contact') }}" class="button white_outline" style="margin-left:1rem"><div class="btn_text splitedText">Contact Us</div></a>
							</div>
						</div>
						<div class="col-md-5 text-md-end mt-3 mt-md-0">
							<div style="display:inline-block;text-align:left;padding:1.6rem;border-radius:.8rem;background:#fff;box-shadow:0 12px 28px rgba(6,12,20,0.04);">
								<div style="font-size:1.4rem;color:rgba(0,0,0,0.6)">Call us</div>
								<a href="tel:+8801622374228" style="font-size:2.2rem;font-weight:700;color:var(--theme);display:block;margin-top:.4rem">+880 1622-374228</a>
								<a href="mailto:riazulislamabir99@gmail.com" style="display:block;margin-top:.6rem;color:rgba(0,0,0,0.7)">riazulislamabir99@gmail.com</a>
								<div class="social_icons mt_20" style="display:flex;gap:1rem">
									<a href="#" target="_blank" style="width:3.2rem;height:3.2rem;border-radius:0.6rem;display:inline-flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#B86B1F,#8f4f12);color:#fff"><i class="ri-instagram-line"></i></a>
									<a href="#" target="_blank" style="width:3.2rem;height:3.2rem;border-radius:0.6rem;display:inline-flex;align-items:center;justify-content:center;background:#f4f4f4;color:var(--dark)"><i class="ri-facebook-fill"></i></a>
									<a href="#" target="_blank" style="width:3.2rem;height:3.2rem;border-radius:0.6rem;display:inline-flex;align-items:center;justify-content:center;background:#f4f4f4;color:var(--dark)"><i class="ri-linkedin-fill"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
@endsection