@extends('frontend.app')

@section('title') Contact Us @endsection

@section('content')
    <main class="overflow-hidden">
        <!-- home area -->
        <div class="banner_area inner_banner">
            <div class="banner_img" style="background-image: url(assets/img/home_bg.jpeg);"></div>
            <div class="container">
                <div class="banner_left parallax-fast parallax-content">
                    <h1>We love to hear from you. Let's talk!</h1>
                    <a href="contact.html" class="button white_btn mt_40">
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6211 0.0097645C11.2122 -0.056433 10.8257 0.220941 10.7595 0.629831C10.6935 1.03755 10.9793 1.42347 11.3863 1.4913C11.4417 1.50363 11.5877 1.53714 11.7038 1.57097C11.9362 1.63865 12.2815 1.75618 12.7072 1.95134C13.5575 2.34117 14.7317 3.04216 15.9695 4.28002C17.2074 5.51789 17.9084 6.69207 18.2982 7.54238C18.4934 7.96806 18.6109 8.31339 18.6786 8.54572C18.7124 8.66188 18.7337 8.7497 18.7461 8.80508C18.7522 8.83277 18.758 8.86213 18.7601 8.87306C18.8279 9.28003 19.212 9.55606 19.6197 9.49005C20.0286 9.42385 20.3034 9.02134 20.2373 8.61245L20.2315 8.58125C20.2267 8.55594 20.2197 8.52168 20.2102 8.47901C20.1912 8.39369 20.1619 8.27466 20.1187 8.12625C20.0323 7.82947 19.8899 7.41487 19.6617 6.91725C19.205 5.92097 18.406 4.59516 17.0302 3.21936C15.6544 1.84356 14.3286 1.04456 13.3323 0.587803C12.8347 0.359667 12.4201 0.217262 12.1233 0.130819C11.9749 0.0875934 11.8559 0.0583355 11.7705 0.0393323C11.734 0.0312069 11.6692 0.0189011 11.6354 0.0124759L11.6211 0.0097645ZM11.9129 3.56419C11.5146 3.4504 11.0995 3.68102 10.9857 4.0793C10.8729 4.47419 11.0987 4.88564 11.4907 5.00352L11.5015 5.00721C11.5165 5.01254 11.5461 5.02358 11.5893 5.04209C11.6757 5.07909 11.8169 5.14619 12.0055 5.25781C12.3822 5.48078 12.9515 5.88348 13.6514 6.58343C14.3514 7.28339 14.7541 7.85264 14.9771 8.22938C15.0887 8.41797 15.1558 8.5592 15.1928 8.64554C15.2113 8.68874 15.2223 8.71832 15.2276 8.73335L15.2313 8.74413C15.3492 9.13619 15.7607 9.36195 16.1556 9.24912C16.5538 9.13533 16.7845 8.72021 16.6707 8.32194L15.9495 8.52798C16.6707 8.32194 16.6702 8.3205 16.6702 8.3205L16.6698 8.31896L16.6688 8.31563L16.6665 8.30788L16.6604 8.28809C16.6555 8.27301 16.6493 8.25418 16.6413 8.23173C16.6254 8.18682 16.6027 8.12746 16.5715 8.05466C16.509 7.90897 16.4126 7.70991 16.2679 7.4654C15.9782 6.97593 15.4971 6.30775 14.7121 5.52277C13.9271 4.7378 13.2589 4.25662 12.7695 3.96694C12.5249 3.82223 12.3259 3.72581 12.1802 3.66337C12.1074 3.63217 12.048 3.60951 12.0031 3.59357C11.9807 3.5856 11.9618 3.57932 11.9468 3.5745L11.927 3.56834L11.9192 3.56602L11.9159 3.56505L11.9144 3.56461L11.9129 3.56419ZM12.6007 13.777L13.0562 13.2975C13.6858 12.6346 14.6672 12.4984 15.4728 12.9621L17.3833 14.0617C18.6102 14.7679 18.8806 16.4987 17.9217 17.5082L16.5011 19.0038C16.1399 19.384 15.6917 19.662 15.1763 19.7129C13.5468 19.8737 9.56214 19.696 5.31536 15.2249C1.31071 11.0088 0.593035 7.39521 0.502888 5.71569C0.467652 5.05921 0.758229 4.46741 1.19185 4.01089L2.76145 2.3584C3.63596 1.4377 5.11028 1.58026 5.87326 2.65937L7.13424 4.44286C7.75068 5.31472 7.68407 6.509 6.97752 7.25287L6.6907 7.55483C6.6907 7.55483 5.60812 8.69459 8.56312 11.8057C11.5181 14.9167 12.6007 13.777 12.6007 13.777Z" fill="#010101"/>
                        </svg>
                        <div class="btn_text splitedText">Contact Us</div>
                    </a>
                </div>
            </div>
        </div>

        <!-- contact area -->
        <div class="contact_area sec_pad">
            <div class="container position-relative">
                <h2 class="text-left">Get In Touch</h2>
                <hr>
                <div class="row justify-content-between mt_40">
                    <div class="col-lg-6">
                        <div class="contact_details fade-up">
                           <p>Have questions about our solutions or looking for a technology partner? Our team is ready to assist you! Get in touch with us today.</p>

							<div class="contact_item">
								<div class="contact_icon">
									<i class="ri-map-pin-line"></i>
								</div>
								<div class="contact_content">
									<p><strong>Shop Address</strong></p>
									<p>Block D, Road 2, Aftabnagar, Dhaka</p>
								</div>
							</div>                          
							<div class="contact_item">
								<div class="contact_icon">
									<i class="ri-phone-line"></i>
								</div>
								<div class="contact_content">
									<p><strong>Phone</strong></p>
									<p><a href="tel:+8801622374228">+880 1622-374228</a></p>
								</div>
							</div>                           
							<div class="contact_item">
								<div class="contact_icon">
									<i class="ri-mail-line"></i>
								</div>
								<div class="contact_content">
									<p><strong>Email</strong></p>
									<a href="mailto:riazulislamabir99@gmail.com"> riazulislamabir99@gmail.com </a>
								</div>
							</div>
							
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.1191377485097!2d90.4359691760526!3d23.81436218631645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c633b4c0780f%3A0x1875afab5e269c52!2sJCX%20Business%20Tower!5e0!3m2!1sen!2sbd!4v1761581842108!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="fade-up"></iframe>
                    </div>
                </div>


                <div class="contact_box mt_100 fade-up">
                    <h4>Send us a message.</h4>
                    <form action="#" class="contact_form">
                        <div class="row medium-gap">
                            <div class="col-sm-6 mt_25">
                                <input type="text" class="name" placeholder="Enter your name">
                            </div>                            
                            <div class="col-sm-6 mt_25">
                                <input type="email" class="email" placeholder="Enter your email address">
                            </div>                            
                            <div class="col-sm-6 mt_25">
                                <input type="tel" class="phone" placeholder="Enter your mobile number">
                            </div>                            
                            <div class="col-sm-6 mt_25">
                                <input type="text" class="email" placeholder="Enter your subject">
                            </div>
                            <div class="col-12 mt_25">
                                <textarea placeholder="Write message here..."></textarea>
                                <p>By clicking Send Now, you have read and agreed with our <a href="#">term of use</a> and <a href="#">privacy policy</a>.</p>
                            </div>
                            <div class="col-12 mt_30">
                                <button type="submit" class="button">
                                    <div class="btn_text splitedText">Send Now </div>
                                    <img src="assets/img/longarrow.svg" alt="">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </main>

    <!-- Toast Notification -->
    <div id="toast" class="toast-notification"></div>

    <style>
        .toast-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            min-width: 300px;
            max-width: 400px;
            padding: 16px 20px;
            background: #4CAF50;
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 9999;
            opacity: 0;
            transform: translateX(400px);
            transition: all 0.3s ease-in-out;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .toast-notification.show {
            opacity: 1;
            transform: translateX(0);
        }

        .toast-notification.error {
            background: #f44336;
        }

        .toast-notification .toast-icon {
            font-size: 24px;
        }

        .toast-notification .toast-close {
            margin-left: auto;
            cursor: pointer;
            font-size: 20px;
            opacity: 0.8;
        }

        .toast-notification .toast-close:hover {
            opacity: 1;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');
            const toast = document.getElementById('toast');

            function showToast(message, type = 'success') {
                const icon = type === 'success' ? '✓' : '✕';
                toast.innerHTML = `
                    <span class="toast-icon">${icon}</span>
                    <span>${message}</span>
                    <span class="toast-close" onclick="hideToast()">×</span>
                `;
                toast.className = 'toast-notification show ' + (type === 'error' ? 'error' : '');
                
                setTimeout(() => {
                    hideToast();
                }, 5000);
            }

            window.hideToast = function() {
                toast.classList.remove('show');
            }

            // Clear previous errors
            function clearErrors() {
                document.querySelectorAll('.text-danger').forEach(el => {
                    el.style.display = 'none';
                    el.textContent = '';
                });
            }

            // Show validation errors
            function showErrors(errors) {
                clearErrors();
                for (let field in errors) {
                    const errorDiv = document.querySelector('.error-' + field);
                    if (errorDiv) {
                        errorDiv.textContent = errors[field][0];
                        errorDiv.style.display = 'block';
                    }
                }
            }

            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                clearErrors();
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.7';

                const formData = new FormData(contactForm);
                
                fetch('{{ route('contact.store') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast(data.message, 'success');
                        contactForm.reset();
                    } else if (data.errors) {
                        showErrors(data.errors);
                        showToast('Please fix the errors in the form', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('An error occurred. Please try again.', 'error');
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.style.opacity = '1';
                });
            });
        });
    </script>
@endsection