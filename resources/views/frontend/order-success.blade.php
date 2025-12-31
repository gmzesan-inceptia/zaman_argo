@extends('frontend.app')

@section('title')
    Order Successful
@endsection

@push('styles')
    <style>
        .success-container {
            min-height: calc(100vh - 200px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .success-card {
            background: white;
            border-radius: 1rem;
            padding: 3rem;
            margin: 10rem 0 2rem 0;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background: #4CAF50;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            animation: scaleUp 0.6s ease-out;
        }

        .success-icon i {
            font-size: 3rem;
            color: white;
        }

        @keyframes scaleUp {
            from {
                transform: scale(0);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .success-title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1rem;
        }

        .success-message {
            font-size: 1rem;
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .order-details {
            background: #f9f7f2;
            border-radius: 0.8rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            text-align: left;
        }

        .order-details h5 {
            font-size: 0.9rem;
            font-weight: 600;
            color: #B86B1F;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .order-detail-row {
            display: flex;
            justify-content: space-between;
            padding: 0.7rem 0;
            border-bottom: 1px solid #e9e9e9;
        }

        .order-detail-row:last-child {
            border-bottom: none;
        }

        .order-detail-label {
            font-weight: 600;
            color: #333;
        }

        .order-detail-value {
            color: #666;
        }

        .next-steps {
            background: #fff3cd;
            border-left: 4px solid #B86B1F;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
            text-align: left;
        }

        .next-steps h6 {
            font-weight: 700;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .next-steps p {
            font-size: 0.9rem;
            color: #666;
            margin: 0;
            line-height: 1.6;
        }

        .success-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .success-buttons a {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-home {
            background: #B86B1F;
            color: white;
        }

        .btn-home:hover {
            background: #8B5415;
            transform: translateY(-2px);
        }

        .btn-products {
            background: transparent;
            color: #B86B1F;
            border: 2px solid #B86B1F;
        }

        .btn-products:hover {
            background: #B86B1F;
            color: white;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .success-card {
                padding: 2rem;
            }

            .success-title {
                font-size: 1.5rem;
            }

            .success-icon {
                width: 80px;
                height: 80px;
            }

            .success-icon i {
                font-size: 2.5rem;
            }

            .order-details {
                padding: 1rem;
            }

            .success-buttons {
                flex-direction: column;
            }

            .success-buttons a {
                width: 100%;
            }
        }
    </style>
@endpush

@section('content')
    <main class="overflow-hidden">
        <div class="success-container">
            <div class="success-card">
                <div class="success-icon">
                    <i class="ri-check-line"></i>
                </div>

                <h1 class="success-title">Order Successful!</h1>

                <p class="success-message">
                    Thank you for your order! We've received it and will process it shortly.
                    Our team will contact you soon to confirm the details.
                </p>

                <div class="order-details">
                    <h5>Order Information</h5>
                    <div class="order-detail-row">
                        <span class="order-detail-label">Order ID</span>
                        <span class="order-detail-value">#{{ $order->id }}</span>
                    </div>
                    <div class="order-detail-row">
                        <span class="order-detail-label">Product</span>
                        <span class="order-detail-value">{{ $order->product_title }}</span>
                    </div>
                    <div class="order-detail-row">
                        <span class="order-detail-label">Quantity</span>
                        <span class="order-detail-value">{{ $order->quantity }}</span>
                    </div>
                    <div class="order-detail-row">
                        <span class="order-detail-label">Payment Method</span>
                        <span class="order-detail-value">
                            @if ($order->payment_method === 'manual-bkash')
                                Bkash/Nagad (Manual)
                            @elseif ($order->payment_method === 'cod')
                                Cash on Delivery
                            @else
                                {{ ucfirst(str_replace('-', ' ', $order->payment_method)) }}
                            @endif
                        </span>
                    </div>
                    <div class="order-detail-row">
                        <span class="order-detail-label">Status</span>
                        <span class="order-detail-value">
                            <span class="badge bg-warning text-dark">Pending</span>
                        </span>
                    </div>
                    <div class="order-detail-row">
                        <span class="order-detail-label">Date</span>
                        <span class="order-detail-value">{{ $order->created_at->format('M d, Y') }}</span>
                    </div>
                </div>

                <div class="next-steps">
                    <h6><i class="ri-information-line"></i> What's Next?</h6>
                    @if ($order->payment_method === 'manual-bkash')
                        <p>
                            We'll verify your manual payment and send you a confirmation via WhatsApp/SMS shortly.
                            Please keep your phone nearby to receive updates about your order.
                        </p>
                    @else
                        <p>
                            Our team will contact you shortly to arrange delivery and payment collection.
                            You can pay when the order arrives at your doorstep.
                        </p>
                    @endif
                </div>

                <div class="success-buttons">
                    <a href="{{ route('home') }}" class="btn-home">
                        <i class="ri-home-line"></i> Back to Home
                    </a>
                    <a href="{{ route('products') }}" class="btn-products">
                        <i class="ri-shopping-bag-line"></i> Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
