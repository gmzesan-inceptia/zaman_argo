@extends('admin.app')

@section('title', 'Order Details')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-1" style="color: #2c3e50; font-weight: 700;">Order #{{ $order->id }}</h2>
                            <p class="text-muted mb-0">Order placed on {{ $order->created_at->format('F d, Y \a\t H:i') }}</p>
                        </div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Orders</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Order #{{ $order->id }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="ri-check-circle-line me-2" style="font-size: 1.3rem;"></i>
                                {{ session('success') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Order Status Card -->
                    <div class="card border-0 shadow-sm mb-4" style="border-top: 4px solid #B86B1F;">
                        <div class="card-body p-4">
                            <div class="row align-items-center mb-4">
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <h6 class="text-muted text-uppercase mb-2" style="font-size: 0.8rem; letter-spacing: 1px;">Current Status</h6>
                                        <div class="mb-2">
                                            @if($order->status === 'pending')
                                                <span class="badge" style="background: #fff3cd; color: #856404; font-size: 1rem; padding: 0.6rem 1.2rem;">
                                                    <i class="ri-time-line me-1"></i> Pending
                                                </span>
                                            @elseif($order->status === 'confirmed')
                                                <span class="badge" style="background: #cfe2ff; color: #084298; font-size: 1rem; padding: 0.6rem 1.2rem;">
                                                    <i class="ri-checkbox-circle-line me-1"></i> Confirmed
                                                </span>
                                            @elseif($order->status === 'shipped')
                                                <span class="badge" style="background: #e7f1ff; color: #0c63e4; font-size: 1rem; padding: 0.6rem 1.2rem;">
                                                    <i class="ri-truck-line me-1"></i> Shipped
                                                </span>
                                            @elseif($order->status === 'delivered')
                                                <span class="badge" style="background: #d1e7dd; color: #0f5132; font-size: 1rem; padding: 0.6rem 1.2rem;">
                                                    <i class="ri-check-double-line me-1"></i> Delivered
                                                </span>
                                            @elseif($order->status === 'cancelled')
                                                <span class="badge" style="background: #f8d7da; color: #842029; font-size: 1rem; padding: 0.6rem 1.2rem;">
                                                    <i class="ri-close-circle-line me-1"></i> Cancelled
                                                </span>
                                            @else
                                                <span class="badge bg-secondary" style="font-size: 1rem; padding: 0.6rem 1.2rem;">{{ ucfirst($order->status) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center border-start border-end">
                                        <h6 class="text-muted text-uppercase mb-2" style="font-size: 0.8rem; letter-spacing: 1px;">Order Total</h6>
                                        <h4 style="color: #B86B1F; font-weight: 700;">{{ $order->quantity }} Items</h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <h6 class="text-muted text-uppercase mb-2" style="font-size: 0.8rem; letter-spacing: 1px;">Payment</h6>
                                        <p class="mb-0">
                                            @if($order->payment_method === 'manual-bkash')
                                                <span class="badge bg-primary" style="font-size: 0.9rem;">Bkash/Nagad</span>
                                            @elseif($order->payment_method === 'cod')
                                                <span class="badge" style="background: #fff3cd; color: #856404;">Cash on Delivery</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Details Card -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-light border-0 py-4">
                            <h5 class="card-title mb-0" style="color: #2c3e50; font-weight: 600;">
                                <i class="ri-shopping-cart-line me-2" style="color: #B86B1F;"></i>Product Details
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h6 class="text-muted mb-2" style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Product Name</h6>
                                    <h5 style="color: #2c3e50; font-weight: 600;">{{ $order->product_title }}</h5>
                                </div>
                                <div class="col-md-3 text-center">
                                    <h6 class="text-muted mb-2" style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Quantity</h6>
                                    <div class="display-6" style="color: #B86B1F; font-weight: 700;">{{ $order->quantity }}</div>
                                </div>
                                <div class="col-md-3 text-end">
                                    <h6 class="text-muted mb-2" style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Total Price</h6>
                                    <div class="display-6" style="color: #B86B1F; font-weight: 700;">BDT {{ number_format($order->total_price, 0) }}</div>
                                </div>
                            </div>

                            @if($order->note)
                                <div class="alert alert-light border-start" style="border-color: #B86B1F; border-width: 3px;">
                                    <h6 class="mb-2" style="color: #2c3e50; font-weight: 600;">
                                        <i class="ri-edit-2-line me-2" style="color: #B86B1F;"></i>Customer Note
                                    </h6>
                                    <p class="mb-0 text-muted">{{ $order->note }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Customer Information Card -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-light border-0 py-4">
                            <h5 class="card-title mb-0" style="color: #2c3e50; font-weight: 600;">
                                <i class="ri-user-line me-2" style="color: #B86B1F;"></i>Customer Information
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="text-muted mb-2" style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Full Name</h6>
                                    <p class="mb-0" style="color: #2c3e50; font-weight: 600; font-size: 1.1rem;">{{ $order->customer_name }}</p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="text-muted mb-2" style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Phone / WhatsApp</h6>
                                    <p class="mb-0">
                                        <a href="tel:{{ $order->customer_phone }}" class="text-decoration-none" style="color: #B86B1F; font-weight: 600; font-size: 1.1rem;">
                                            <i class="ri-phone-line me-2"></i>{{ $order->customer_phone }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="text-muted mb-2" style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Delivery Address</h6>
                                    <p class="mb-0" style="color: #2c3e50; line-height: 1.6;">
                                        <i class="ri-map-pin-line me-2" style="color: #B86B1F;"></i>{{ $order->customer_address }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Quick Actions Card -->
                    <div class="card border-0 shadow-sm mb-4" style="border-top: 4px solid #B86B1F;">
                        <div class="card-header bg-light border-0 py-4">
                            <h5 class="card-title mb-0" style="color: #2c3e50; font-weight: 600;">
                                <i class="ri-tools-line me-2" style="color: #B86B1F;"></i>Actions
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <!-- Payment Information -->
                            @if($order->payment_method === 'manual-bkash')
                                <div class="alert alert-info border-0 mb-3" style="background: #cfe2ff; border-left: 3px solid #0c63e4;">
                                    <h6 class="mb-2" style="color: #084298; font-weight: 600;">
                                        <i class="ri-wallet-line me-2"></i>Payment Details
                                    </h6>
                                    @if($order->manual_number)
                                        <small style="color: #084298;">
                                            <strong>Mobile:</strong> {{ $order->manual_number }}<br>
                                        </small>
                                    @endif
                                    @if($order->transaction_id)
                                        <small style="color: #084298;">
                                            <strong>Txn ID:</strong> {{ $order->transaction_id }}
                                        </small>
                                    @endif
                                </div>
                            @endif

                            <!-- Status Actions -->
                            <div class="mb-4">
                                <h6 class="mb-3" style="color: #2c3e50; font-weight: 600;">
                                    <i class="ri-arrow-right-circle-line me-2" style="color: #B86B1F;"></i>Change Status
                                </h6>

                                @if($order->status === 'pending')
                                    <form action="{{ route('orders.approve', $order->id) }}" method="POST" class="mb-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn w-100" style="background: #d1e7dd; color: #0f5132; border: none; font-weight: 600;">
                                            <i class="ri-check-line me-2"></i>Approve Order
                                        </button>
                                    </form>
                                    <form action="{{ route('orders.reject', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn w-100 btn-outline-danger fw-600">
                                            <i class="ri-close-line me-2"></i>Reject Order
                                        </button>
                                    </form>
                                @elseif($order->status === 'confirmed')
                                    <form action="{{ route('orders.shipped', $order->id) }}" method="POST" class="mb-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn w-100" style="background: #e7f1ff; color: #0c63e4; border: none; font-weight: 600;">
                                            <i class="ri-truck-line me-2"></i>Mark as Shipped
                                        </button>
                                    </form>
                                @elseif($order->status === 'shipped')
                                    <form action="{{ route('orders.delivered', $order->id) }}" method="POST" class="mb-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn w-100" style="background: #d1e7dd; color: #0f5132; border: none; font-weight: 600;">
                                            <i class="ri-check-double-line me-2"></i>Mark as Delivered
                                        </button>
                                    </form>
                                @endif

                                @if(!in_array($order->status, ['delivered', 'cancelled']))
                                    <form action="{{ route('orders.reject', $order->id) }}" method="POST" class="mt-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn w-100 btn-outline-danger fw-600">
                                            <i class="ri-close-line me-2"></i>Cancel Order
                                        </button>
                                    </form>
                                @endif
                            </div>

                            <!-- Completion Status -->
                            @if($order->status === 'delivered' || $order->status === 'cancelled')
                                <div class="alert border-0 mb-0" style="background: {{ $order->status === 'delivered' ? '#d1e7dd' : '#f8d7da' }}; border-left: 3px solid {{ $order->status === 'delivered' ? '#0f5132' : '#842029' }};">
                                    <i class="ri-{{ $order->status === 'delivered' ? 'check-double-line' : 'close-line' }}" style="color: {{ $order->status === 'delivered' ? '#0f5132' : '#842029' }}; font-size: 1.2rem;"></i>
                                    <span style="color: {{ $order->status === 'delivered' ? '#0f5132' : '#842029' }}; font-weight: 600;">
                                        Order {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                            @endif

                            <hr class="my-4">

                            <!-- Back Button -->
                            <a href="{{ route('orders.index') }}" class="btn btn-secondary w-100 fw-600">
                                <i class="ri-arrow-left-line me-2"></i>Back to Orders
                            </a>
                        </div>
                    </div>

                    <!-- Timeline Card -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-light border-0 py-4">
                            <h5 class="card-title mb-0" style="color: #2c3e50; font-weight: 600;">
                                <i class="ri-timeline-line me-2" style="color: #B86B1F;"></i>Timeline
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <!-- Progress Bar -->
                            <div class="mb-4">
                                @php
                                    $progress = 0;
                                    if ($order->status === 'pending') $progress = 25;
                                    elseif ($order->status === 'confirmed') $progress = 50;
                                    elseif ($order->status === 'shipped') $progress = 75;
                                    elseif ($order->status === 'delivered') $progress = 100;
                                    elseif ($order->status === 'cancelled') $progress = 0;
                                @endphp
                                <div class="d-flex justify-content-between mb-2">
                                    <small style="color: #2c3e50; font-weight: 600;">Progress</small>
                                    <small style="color: #B86B1F; font-weight: 600;">{{ $progress }}%</small>
                                </div>
                                <div class="progress" style="height: 6px; border-radius: 3px; background: #e9ecef;">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%; background: #B86B1F;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="timeline-modern">
                                <!-- Pending Step -->
                                <div class="timeline-step {{ $order->status != 'pending' ? 'completed' : 'active' }} {{ $order->status === 'cancelled' ? 'cancelled' : '' }}">
                                    <div class="timeline-marker">
                                        <i class="ri-time-line"></i>
                                    </div>
                                    <div class="timeline-label">
                                        <h6 class="mb-1" style="color: #2c3e50; font-weight: 600;">Pending</h6>
                                        <small class="text-muted">Order placed</small>
                                    </div>
                                </div>

                                <!-- Confirmed Step -->
                                <div class="timeline-step {{ in_array($order->status, ['confirmed', 'shipped', 'delivered']) ? 'completed' : '' }} {{ $order->status === 'confirmed' && $order->status !== 'cancelled' ? 'active' : '' }} {{ $order->status === 'cancelled' ? 'cancelled' : '' }}">
                                    <div class="timeline-marker">
                                        <i class="ri-checkbox-circle-line"></i>
                                    </div>
                                    <div class="timeline-label">
                                        <h6 class="mb-1" style="color: #2c3e50; font-weight: 600;">Confirmed</h6>
                                        <small class="text-muted">Order confirmed</small>
                                    </div>
                                </div>

                                <!-- Shipped Step -->
                                <div class="timeline-step {{ in_array($order->status, ['shipped', 'delivered']) ? 'completed' : '' }} {{ $order->status === 'shipped' ? 'active' : '' }} {{ $order->status === 'cancelled' ? 'cancelled' : '' }}">
                                    <div class="timeline-marker">
                                        <i class="ri-truck-line"></i>
                                    </div>
                                    <div class="timeline-label">
                                        <h6 class="mb-1" style="color: #2c3e50; font-weight: 600;">Shipped</h6>
                                        <small class="text-muted">On the way</small>
                                    </div>
                                </div>

                                <!-- Delivered Step -->
                                <div class="timeline-step {{ $order->status === 'delivered' ? 'completed active' : '' }} {{ $order->status === 'cancelled' ? 'cancelled' : '' }}">
                                    <div class="timeline-marker">
                                        <i class="ri-check-double-line"></i>
                                    </div>
                                    <div class="timeline-label">
                                        <h6 class="mb-1" style="color: #2c3e50; font-weight: 600;">Delivered</h6>
                                        <small class="text-muted">Order delivered</small>
                                    </div>
                                </div>
                            </div>

                            @if($order->status === 'cancelled')
                                <div class="alert alert-danger border-0 mt-4 mb-0" style="background: #f8d7da; border-left: 3px solid #842029;">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-close-circle-line me-2" style="color: #842029; font-size: 1.3rem;"></i>
                                        <span style="color: #842029; font-weight: 600;">Order has been cancelled</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Modern Timeline */
        .timeline-modern {
            position: relative;
        }

        .timeline-step {
            position: relative;
            display: flex;
            align-items: flex-start;
            margin-bottom: 2.5rem;
            opacity: 0.6;
            transition: all 0.3s ease;
        }

        .timeline-step.completed {
            opacity: 1;
        }

        .timeline-step.active {
            opacity: 1;
        }

        .timeline-step.cancelled {
            opacity: 0.4;
            text-decoration: line-through;
        }

        .timeline-step:last-child {
            margin-bottom: 0;
        }

        .timeline-step:not(:last-child)::after {
            content: '';
            position: absolute;
            left: 15px;
            top: 50px;
            bottom: -50px;
            width: 2px;
            background: #e9ecef;
            transition: all 0.3s ease;
        }

        .timeline-step.completed:not(:last-child)::after {
            background: #B86B1F;
        }

        .timeline-step.active:not(:last-child)::after {
            background: #0c63e4;
        }

        .timeline-step.cancelled:not(:last-child)::after {
            background: #ccc;
        }

        .timeline-marker {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f8f9fa;
            border: 2px solid #dee2e6;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            font-size: 1.2rem;
            color: #6c757d;
            flex-shrink: 0;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .timeline-step.completed .timeline-marker {
            background: #B86B1F;
            border-color: #B86B1F;
            color: white;
            box-shadow: 0 2px 8px rgba(184, 107, 31, 0.3);
        }

        .timeline-step.active .timeline-marker {
            background: #0c63e4;
            border-color: #0c63e4;
            color: white;
            box-shadow: 0 0 0 3px rgba(12, 99, 228, 0.15);
            animation: pulse 2s infinite;
        }

        .timeline-step.cancelled .timeline-marker {
            background: #ddd;
            border-color: #999;
            color: #999;
        }

        .timeline-label {
            padding-top: 0.25rem;
        }

        .timeline-step.cancelled .timeline-label h6,
        .timeline-step.cancelled .timeline-label small {
            color: #999 !important;
        }

        /* Pulse Animation */
        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 0 0 3px rgba(12, 99, 228, 0.15);
            }
            50% {
                box-shadow: 0 0 0 6px rgba(12, 99, 228, 0.1);
            }
        }

        /* Card Enhancements */
        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08) !important;
        }

        /* Button Styles */
        .btn {
            transition: all 0.3s ease;
            font-weight: 600;
            border-radius: 0.5rem;
            padding: 0.6rem 1.2rem;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Badge Animations */
        .badge {
            display: inline-block;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Alert Enhancements */
        .alert {
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .alert:hover {
            transform: translateX(4px);
        }

        /* Progress Bar */
        .progress {
            overflow: hidden;
        }

        .progress-bar {
            transition: width 0.6s ease;
        }
    </style>
@endpush
