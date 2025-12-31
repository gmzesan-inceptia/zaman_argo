@extends('frontend.app')

@section('title')
    Product Details
@endsection

@push('styles')
    <style>
        /* Quick view overlay */
        .pd-quickview {
            position: fixed;
            inset: 0;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.85);
            z-index: 3000
        }

        .pd-quickview.active {
            display: flex
        }

        .pd-quickview img {
            max-width: 90%;
            max-height: 90%;
            border-radius: .6rem;
            box-shadow: 0 2.4rem 6rem rgba(0, 0, 0, 0.6)
        }

        .pd-qv-close {
            position: fixed;
            top: 1.6rem;
            right: 1.6rem;
            background: transparent;
            border: 0;
            color: #fff;
            font-size: 2.2rem;
            cursor: pointer
        }

        .thumb.active {
            outline: .4rem solid rgba(184, 107, 31, 0.12)
        }



        /* Modal form styling — larger inputs/text for readability */
        .modal .modal-content {
            border-radius: .9rem
        }

        .modal .modal-body {
            font-size: 2rem
        }

        .modal .modal-title {
            font-size: 2.8rem;
            font-weight: 600
        }

        .modal .form-control {
            border-radius: .75rem;
            padding: 1rem;
            font-size: 1.5rem;
            line-height: 1.3;
            box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.03);
            border: 1px solid #e6e6e6
        }

        .modal .form-control:focus {
            outline: 0;
            box-shadow: 0 0 0 .18rem rgba(184, 107, 31, 0.12);
            border-color: #B86B1F
        }

        .modal .input-group-text {
            background: #fff;
            border: 1px solid #e6e6e6;
            border-right: 0;
            padding: .6rem .85rem;
            font-size: 1.2rem
        }

        .modal .input-group .form-control {
            border-left: 0
        }

        .modal .form-label {
            font-size: 1rem;
            font-weight: 600
        }

        .modal .btn-primary {
            background: #B86B1F;
            border-color: #B86B1F;
            padding: .6rem 1.1rem;
            font-size: 1.5rem
        }

        .modal .btn-secondary {
            padding: .6rem 1.1rem;
            font-size: 1.5rem
        }

        @media (max-width:576px) {
            .modal .form-control {
                font-size: .98rem;
                padding: .7rem .9rem
            }

            .modal .modal-title {
                font-size: 1rem
            }
        }

        /* Payment method cards */
        .payment-methods {
            display: flex;
            gap: .75rem;
            align-items: center;
            margin-top: .5rem
        }

        .pm-option {
            flex: 1;
            display: flex;
            gap: .75rem;
            align-items: center;
            padding: .75rem 1rem;
            border-radius: .8rem;
            border: 1px solid #eee;
            background: linear-gradient(180deg, #fff, #fff);
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(12, 18, 24, 0.04);
            transition: transform .14s, box-shadow .14s, border-color .14s
        }

        .pm-option i {
            font-size: 1.4rem;
            color: #B86B1F
        }

        .pm-option .pm-label {
            font-weight: 700;
            color: #2b2b2b;
            font-size: 1.2rem
        }

        .pm-option .pm-sub {
            font-size: .92rem;
            color: #6b6f73
        }

        .pm-option input[type=radio] {
            position: absolute;
            left: -9999px
        }

        .pm-option:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 40px rgba(12, 18, 24, 0.08)
        }

        .pm-option.active {
            border-color: #B86B1F;
            box-shadow: 0 26px 60px rgba(184, 107, 31, 0.12);
            background: linear-gradient(90deg, rgba(184, 107, 31, 0.06), #fff)
        }

        /* Manual payment info card polish */
        #manualPaymentInfo .card {
            background: linear-gradient(180deg, #fff, #fff);
            border: 1px solid rgba(184, 107, 31, 0.06);
            box-shadow: 0 12px 32px rgba(184, 107, 31, 0.08);
            border-radius: .8rem;
            padding: 1.5rem;
            font-size: 1.5rem;
        }

        #manualPaymentInfo .copy-btn {
            font-size: .8rem;
            padding: .28rem .5rem
        }

        #autoPayBtn {
            font-size: 1.5rem;
            padding: .6rem 1.1rem
        }
    </style>
@endpush

@section('content')
    <main class="overflow-hidden">

        <section class="product-hero">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center py-4">
                    <div>
                        <h1 class="h2 mb-1">{{ $product->title }}</h1>
                        <p class="mb-0 text-muted">Premium pack — product details</p>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <section class="product_information_area sec_pad bg_gray">
            <div class="container">
                <div class="row g-4 align-items-start">
                    <div class="col-lg-6">
                        <div class="product-gallery bg-white p-4 shadow-sm rounded-3">
                            <div class="d-flex justify-content-between mb-2 align-items-start">
                                @if($product->tag)
                                    <div class="badge bg-warning text-dark px-3 py-2">{{ ucfirst($product->tag) }}</div>
                                @endif
                            </div>
                            <div class="main-image text-center mb-3 position-relative">
                                <a href="{{ $product->image ? asset('storage/' . $product->image) : asset('frontend/img/placeholder.jpg') }}"
                                    class="main-link">
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('frontend/img/placeholder.jpg') }}"
                                        alt="{{ $product->title }}" class="img-fluid main-product-img rounded">
                                </a>
                                <button class="btn btn-light position-absolute product-gallery-open"
                                    style="right:1rem;bottom:1rem;box-shadow:0 8px 24px rgba(0,0,0,0.12);">Quick
                                    view</button>
                            </div>
                            <div class="thumbs d-flex gap-3 justify-content-center mt-2">
                                @php
                                    $allImages = collect();
                                    if ($product->image) {
                                        $allImages->push($product->image);
                                    }
                                    if ($product->images) {
                                        $allImages = $allImages->merge($product->images->pluck('image_path'));
                                    }
                                @endphp
                                @foreach ($allImages as $index => $imagePath)
                                    <a href="#" class="thumb-link" data-src="{{ asset('storage/' . $imagePath) }}">
                                        <img src="{{ asset('storage/' . $imagePath) }}"
                                            class="thumb rounded {{ $index === 0 ? 'active' : '' }}"
                                            alt="thumb-{{ $index + 1 }}">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="product-info bg-white p-4 shadow-sm rounded-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h2 class="product-title mb-0">{{ $product->title }}</h2>
                                @if($product->tag)
                                    <span style="background: #B86B1F; color: white; padding: 0.4rem 0.8rem; border-radius: 0.4rem; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; white-space: nowrap;">
                                        {{ $product->tag }}
                                    </span>
                                @endif
                            </div>
                            
                            @if($product->unit)
                                <div class="mb-3">
                                    <small class="text-muted" style="font-size: 0.95rem;">
                                        <i class="ri-scales-3-line"></i> Unit: <strong>{{ $product->unit }}</strong>
                                    </small>
                                </div>
                            @endif

                            <div class="d-flex align-items-center mb-3">
                                <div class="text-success">
                                    Shipping Charge: BDT {{ number_format($shippingCharge, 0) }}
                                </div>
                            </div>

                            <div class="price mb-3 d-flex align-items-baseline gap-3">
                                <span class="h3 text-danger">BDT {{ number_format($product->new_price, 0) }}</span>
                                @if ($product->old_price)
                                    <span class="text-muted text-decoration-line-through">BDT
                                        {{ number_format($product->old_price, 0) }}</span>
                                @endif
                            </div>

                            <div class="mb-5 text-muted">
                                <p>{{ $product->description }}</p>
                            </div>


                            <a href="#" class="button primary order-now-btn" id="orderNowBtn" data-bs-toggle="modal"
                                data-bs-target="#orderModal">
                                <div class="btn_text splitedText">Order Now</div>
                                <i class="ri-shopping-cart-2-line"></i>
                            </a>
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
                            <h2>Related Products</h2>
                            <p>Explore our other premium date varieties</p>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    @foreach ($relatedProducts as $relatedProduct)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product_card">
                                <div class="product_img">
                                    <img src="{{ $relatedProduct->image ? asset('storage/' . $relatedProduct->image) : asset('frontend/img/placeholder.jpg') }}"
                                        alt="{{ $relatedProduct->title }}">
                                </div>
                                <div class="product_info">
                                    <div class="product_meta">
                                        <h5>{{ $relatedProduct->title }}</h5>
                                    </div>
                                    <div class="price">BDT {{ number_format($relatedProduct->new_price, 0) }}</div>
                                </div>
                                <div class="product_subwrap">
                                    <p class="product_sub">{{ Str::limit($relatedProduct->description, 60) }}</p>
                                </div>
                                <div class="product_overlay">
                                    <a href="{{ route('product.details', $relatedProduct->id) }}" class="button primary">
                                        <div class="btn_text">View Details</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <!-- Order Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Place Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="orderForm">
                        <div class="mb-3 input-group">
                            <span class="input-group-text"><i class="ri-user-line"></i></span>
                            <input type="text" class="form-control" id="customerName" name="name"
                                placeholder="Full name" required>
                        </div>

                        <div class="mb-3 input-group">
                            <span class="input-group-text"><i class="ri-phone-line"></i></span>
                            <input type="tel" class="form-control" id="customerPhone" name="phone"
                                placeholder="Phone / WhatsApp" required>
                        </div>

                        <div class="mb-3 input-group">
                            <span class="input-group-text"><i class="ri-map-pin-line"></i></span>
                            <textarea id="customerAddress" name="address" class="form-control"
                                placeholder="Delivery address (street, area, city)" rows="2" required></textarea>
                        </div>

                        <!-- Product Info & Price Calculation -->
                        <div class="mb-3 p-3" style="background: #f8f9fa; border-radius: 0.75rem; border: 1px solid #e6e6e6;">
                            <div class="mb-3">
                                <label class="form-label">Product</label>
                                <div style="font-weight: 600; color: #2b2b2b;">{{ $product->title }}</div>
                                @if($product->unit)
                                    <small class="text-muted" style="font-size: 0.9rem;">
                                        <i class="ri-scales-3-line"></i> Unit: <strong>{{ $product->unit }}</strong>
                                    </small>
                                @endif
                            </div>

                            <div class="row g-2 mb-2">
                                <div class="col-6">
                                    <small class="text-muted d-block mb-1">Unit Price</small>
                                    <div style="font-size: 1rem; font-weight: 600; color: #2b2b2b;">
                                        BDT <span id="modalUnitPrice">{{ number_format($product->new_price, 0) }}</span>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    <small class="text-muted d-block mb-1">Subtotal</small>
                                    <div style="font-size: 1rem; font-weight: 600; color: #2b2b2b;">
                                        BDT <span id="modalSubtotal">{{ number_format($product->new_price, 0) }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mb-2 pb-2" style="border-bottom: 1px solid #ddd;">
                                <div class="col-6">
                                    <small class="text-muted d-block mb-1">Shipping</small>
                                    <div style="font-size: 1rem; font-weight: 600; color: #2b2b2b;">
                                        BDT <span id="modalShippingCharge">0</span>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    <small class="text-muted d-block mb-1">Total Price</small>
                                    <div style="font-size: 1.2rem; font-weight: 700; color: #B86B1F;">
                                        BDT <span id="modalTotalPrice">{{ number_format($product->new_price, 0) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="input-group">
                                <span class="input-group-text">Qty</span>
                                <input type="number" class="form-control" id="orderQty" name="quantity"
                                    min="1" value="1" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="ri-file-text-line"></i></span>
                                <input type="text" class="form-control" id="orderNote" name="note"
                                    placeholder="Note (optional)">
                            </div>
                        </div>

                        <!-- Payment options -->
                        <div class="mb-3">
                            <label class="form-label">Payment Method</label>
                            <div class="payment-methods">
                                <label class="pm-option active">
                                    <input type="radio" name="paymentMethod" id="pay_manual_bkash"
                                        value="manual-bkash" checked>
                                    <i class="ri-wallet-line"></i>
                                    <div>
                                        <div class="pm-label">Manual Bkash / Nagad</div>
                                        <div class="pm-sub">Send payment to our number and paste the Txn ID</div>
                                    </div>
                                </label>
                                <label class="pm-option">
                                    <input type="radio" name="paymentMethod" id="pay_cod" value="cod">
                                    <i class="ri-hand-coin-line"></i>
                                    <div>
                                        <div class="pm-label">Cash on Delivery</div>
                                        <div class="pm-sub">Pay in cash when your order arrives</div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div id="manualPaymentFields">
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="ri-phone-line"></i></span>
                                <input type="text" class="form-control" id="manualNumber" name="manualNumber"
                                    placeholder="Bkash/Nagad Number (e.g. 017xxxxxxxx)">
                            </div>
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="ri-file-paper-line"></i></span>
                                <input type="text" class="form-control" id="manualTxnId" name="manualTxnId"
                                    placeholder="Transaction ID (from agent)">
                            </div>
                            <div id="manualPaymentInfo" class="mt-2">
                                <div class="card p-3" style="border-radius:.6rem;">
                                    <h6 class="mb-2">Manual Payment Instructions</h6>
                                    <p class="small text-muted mb-2">Send the payment to one of the numbers below, then
                                        paste the transaction ID above.</p>
                                    <ul class="list-unstyled small mb-2">
                                        <li class="mb-1"><strong>Bkash (Personal):</strong>
                                            <span id="bkashNumber" class="ms-2">017XXXXXXXX</span>
                                            <button type="button" class="btn btn-sm btn-outline-secondary ms-2 copy-btn"
                                                data-target="bkashNumber">Copy</button>
                                        </li>
                                        <li class="mb-1"><strong>Nagad (Personal):</strong>
                                            <span id="nagadNumber" class="ms-2">018YYYYYYYY</span>
                                            <button type="button" class="btn btn-sm btn-outline-secondary ms-2 copy-btn"
                                                data-target="nagadNumber">Copy</button>
                                        </li>
                                    </ul>
                                    <p class="small mb-0"><strong>Steps:</strong> 1) Send amount to chosen number. 2) Enter
                                        the payer mobile number and transaction ID above. 3) Submit your order — we'll
                                        verify and confirm.</p>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="orderMessage" class="small text-success d-none">Order submitted. We'll contact you soon.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="orderSubmitBtn" class="btn btn-primary">Submit Order</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        (function($) {
            $(function() {
                // Global shipping charge variable (passed from controller)
                const SHIPPING_CHARGE = {{ $shippingCharge ?? 100 }};
                
                // Product price for calculation
                const unitPrice = {{ $product->new_price }};
                
                // Update total price when quantity changes
                function updateTotalPrice() {
                    const qty = parseInt($('#orderQty').val()) || 1;
                    const subtotal = qty * unitPrice;
                    const totalPrice = subtotal + SHIPPING_CHARGE;
                    
                    $('#modalSubtotal').text(new Intl.NumberFormat('en-US').format(subtotal));
                    $('#modalShippingCharge').text(new Intl.NumberFormat('en-US').format(SHIPPING_CHARGE));
                    $('#modalTotalPrice').text(new Intl.NumberFormat('en-US').format(totalPrice));
                }
                
                // Listen for quantity input changes
                $('#orderQty').on('input change', updateTotalPrice);
                
                // Initialize on modal open
                $('#orderModal').on('show.bs.modal', updateTotalPrice);
                
                var $gallery = $('.product-gallery');
                var $mainLink = $gallery.find('.main-link');
                var $mainImg = $mainLink.find('img.main-product-img');
                var $thumbLinks = $gallery.find('.thumb-link');

                // Debug: confirm Magnific Popup availability
                try {
                    console.log('PD gallery init: magnific?', !!$.magnificPopup, 'magnific.open?', !!($
                            .magnificPopup && typeof $.magnificPopup.open === 'function'), 'thumbs=',
                        $thumbLinks.length);
                } catch (e) {
                    console.warn('Console unavailable', e);
                }

                // thumbnail click -> change main image
                $thumbLinks.on('click', function(e) {
                    e.preventDefault();
                    $thumbLinks.find('img').removeClass('active');
                    $(this).find('img').addClass('active');
                    var src = $(this).data('src');
                    $mainImg.attr('src', src);
                    $mainLink.attr('href', src);
                });

                // Build gallery items from thumbs
                function buildItems() {
                    var items = [];
                    $thumbLinks.each(function() {
                        items.push({
                            src: $(this).data('src')
                        });
                    });
                    // ensure main image is included
                    var mainSrc = $mainImg.attr('src');
                    var found = -1;
                    for (var i = 0; i < items.length; i++) {
                        if (items[i].src === mainSrc) {
                            found = i;
                            break;
                        }
                    }
                    if (found === -1) {
                        items.unshift({
                            src: mainSrc
                        });
                        found = 0;
                    }
                    return {
                        items: items,
                        index: found
                    };
                }

                function openGalleryAtCurrent() {
                    var g = buildItems();
                    if (!($.magnificPopup && typeof $.magnificPopup.open === 'function')) {
                        console.error(
                            'Magnific Popup not available — falling back to opening image in new tab');
                        var url = (g.items && g.items[g.index] && g.items[g.index].src) || (g.items && g.items[
                            0] && g.items[0].src);
                        if (url) window.open(url, '_blank');
                        return;
                    }
                    $.magnificPopup.open({
                        items: g.items,
                        type: 'image',
                        gallery: {
                            enabled: true
                        }
                    }, g.index);
                }

                // open gallery when clicking main image or quick view button
                $gallery.on('click', '.product-gallery-open, .main-link', function(e) {
                    e.preventDefault();
                    console.log('product-gallery click detected');
                    openGalleryAtCurrent();
                });

                // initialize main link from active thumb
                var initSrc = $thumbLinks.filter(function() {
                    return $(this).find('img').hasClass('active');
                }).data('src') || $mainImg.attr('src');
                $mainImg.attr('src', initSrc);
                $mainLink.attr('href', initSrc);

                // Payment UI: toggle manual fields
                function refreshPaymentUI() {
                    var pm = $('input[name="paymentMethod"]:checked').val();
                    if (pm === 'manual-bkash') {
                        $('#manualPaymentFields').show();
                    } else if (pm === 'cod') {
                        // Cash on Delivery — no payment fields shown
                        $('#manualPaymentFields').hide();
                    } else {
                        // default fallback
                        $('#manualPaymentFields').show();
                    }
                }
                refreshPaymentUI();
                $('input[name="paymentMethod"]').on('change', refreshPaymentUI);
                // clicking the visual card toggles the radio and UI
                $('.payment-methods').on('click', '.pm-option', function(e) {
                    var $lab = $(this);
                    var $radio = $lab.find('input[type=radio]');
                    $radio.prop('checked', true).trigger('change');
                    $lab.addClass('active').siblings().removeClass('active');
                });

                // Simulate automatic Bkash flow (removed - not using auto-bkash)

                // central submit function used for both manual and auto flows
                function submitOrder(extra) {
                    var form = document.getElementById('orderForm');
                    if (!form.checkValidity()) {
                        form.reportValidity();
                        return;
                    }
                    var payload = {
                        product_title: $('.product-title').text().trim(),
                        product_price: unitPrice,
                        customer_name: $('#customerName').val().trim(),
                        customer_phone: $('#customerPhone').val().trim(),
                        customer_address: $('#customerAddress').val().trim(),
                        quantity: $('#orderQty').val(),
                        note: $('#orderNote').val().trim(),
                        payment_method: $('input[name="paymentMethod"]:checked').val()
                    };
                    if (extra) Object.assign(payload, extra);

                    // If manual payment, require txn id when payment received manually
                    if (payload.payment_method === 'manual-bkash') {
                        var txn = $('#manualTxnId').val().trim();
                        var num = $('#manualNumber').val().trim();
                        if (!txn || !num) {
                            alert('Please provide the mobile number and transaction ID for manual payment.');
                            return;
                        }
                        payload.manual_number = num;
                        payload.transaction_id = txn;
                    }

                    console.log('Order payload:', payload);
                    $('#orderSubmitBtn').prop('disabled', true).text('Sending...');
                    
                    // Send AJAX request
                    $.ajax({
                        url: '{{ route('orders.store') }}',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: payload,
                        success: function(response) {
                            $('#orderMessage').removeClass('d-none').addClass('text-success').text(response.message);
                            setTimeout(function() {
                                var modalEl = document.getElementById('orderModal');
                                var bsModal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                                bsModal.hide();
                                $('#orderForm')[0].reset();
                                $('#orderSubmitBtn').prop('disabled', false).text('Submit Order');
                                $('#orderMessage').addClass('d-none');
                                // Redirect to success page
                                window.location.href = '/order-success/' + response.order_id;
                            }, 1000);
                        },
                        error: function(xhr) {
                            var message = 'Failed to place order. Please try again.';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                message = xhr.responseJSON.message;
                            }
                            $('#orderMessage').removeClass('d-none').addClass('text-danger').text(message);
                            $('#orderSubmitBtn').prop('disabled', false).text('Submit Order');
                            
                            // Show validation errors if any
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                var errors = xhr.responseJSON.errors;
                                var errorMsg = 'Validation errors:\n';
                                for (var field in errors) {
                                    errorMsg += errors[field][0] + '\n';
                                }
                                alert(errorMsg);
                            }
                        }
                    });
                }

                // original submit button now calls central submit
                $('#orderSubmitBtn').on('click', function(e) {
                    submitOrder();
                });

                // copy buttons for manual payment numbers
                $('#manualPaymentInfo').on('click', '.copy-btn', function() {
                    var targetId = $(this).data('target');
                    var txt = document.getElementById(targetId).innerText || '';
                    if (!txt) return;
                    navigator.clipboard?.writeText(txt).then(function() {
                        // small feedback
                        var $btn = $(this);
                    }.bind(this)).catch(function() {
                        alert('Copied: ' + txt);
                    });
                });
            });
        })(jQuery);
    </script>
@endpush
