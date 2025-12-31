@extends('admin.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="container-fluid my-3">
    <div class="row mb-5 g-3">

        {{-- Revenue --}}
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card dashboard-card">
                <div class="card-body target-bg">
                    <div class="dashboard-icon">
                        <i class="ri-money-dollar-circle-line"></i>
                    </div>
                    <div class="dashboard-info">
                        <h4 class="target-title">Total Revenue</h4>
                        <h3 class="numbers">BDT {{ number_format($totalRevenue ?? 0) }}</h3>
                        <small>Monthly: BDT {{ number_format($monthlyRevenue ?? 0) }}</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Orders --}}
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card dashboard-card">
                <div class="card-body target-bg non">
                    <div class="dashboard-icon">
                        <a href="{{ route('orders.index') }}"><i class="ri-shopping-cart-2-line"></i></a>
                    </div>
                    <div class="dashboard-info">
                        <h4 class="target-title">Total Orders</h4>
                        <h3 class="numbers">{{ $orderCount }} +</h3>
                        <a href="{{ route('orders.index') }}">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Products --}}
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card dashboard-card">
                <div class="card-body target-bg">
                    <div class="dashboard-icon">
                        <a href="{{ route('products.index') }}"><i class="ri-box-3-line"></i></a>
                    </div>
                    <div class="dashboard-info">
                        <h4 class="target-title">Products</h4>
                        <h3 class="numbers">{{ $productCount }} +</h3>
                        <a href="{{ route('products.index') }}">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Categories --}}
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card dashboard-card">
                <div class="card-body target-bg non">
                    <div class="dashboard-icon">
                        <a href="{{ route('categories.index') }}"><i class="ri-shopping-cart-2-line"></i></a>
                    </div>
                    <div class="dashboard-info">
                        <h4 class="target-title">Categories</h4>
                        <h3 class="numbers">{{ $categoryCount }} +</h3>
                        <a href="{{ route('categories.index') }}">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pending Orders --}}
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card dashboard-card">
                <div class="card-body target-bg non">
                    <div class="dashboard-icon">
                        <i class="ri-time-line"></i>
                    </div>
                    <div class="dashboard-info">
                        <h4 class="target-title">Pending Orders</h4>
                        <h3 class="numbers">{{ $pendingOrders }} +</h3>
                        <small>Awaiting processing</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Completed Orders --}}
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card dashboard-card">
                <div class="card-body target-bg">
                    <div class="dashboard-icon">
                        <i class="ri-check-double-line"></i>
                    </div>
                    <div class="dashboard-info">
                        <h4 class="target-title">Completed Orders</h4>
                        <h3 class="numbers">{{ $completedOrders }} +</h3>
                        <small>Successfully delivered</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Avg Order Value --}}
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card dashboard-card">
                <div class="card-body target-bg non">
                    <div class="dashboard-icon">
                        <i class="ri-bar-chart-line"></i>
                    </div>
                    <div class="dashboard-info">
                        <h4 class="target-title">Avg Order Value</h4>
                        <h3 class="numbers">BDT {{ $orderCount > 0 ? number_format($totalRevenue / $orderCount, 0) : 0 }} +</h3>
                        <small>Per transaction</small>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Charts Section -->
    <div class="row mb-5 g-3">
        <!-- Order Status Pie Chart -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title mb-4" style="color: #333; font-weight: 600;">Order Status Distribution</h5>
                    <div style="max-width: 300px; margin: 0 auto;">
                        <canvas id="orderStatusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products by Category Bar Chart -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title mb-4" style="color: #333; font-weight: 600;">Products by Category</h5>
                    <canvas id="categoryChart" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
    // Order Status Pie Chart
    const orderStatusCtx = document.getElementById('orderStatusChart').getContext('2d');
    new Chart(orderStatusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Completed', 'Pending'],
            datasets: [{
                data: [{{ $completedOrders }}, {{ $pendingOrders }}],
                backgroundColor: ['#51cf66', '#ff6b6b'],
                borderColor: ['#fff', '#fff'],
                borderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: { size: 12 },
                        padding: 15,
                        usePointStyle: true
                    }
                }
            }
        }
    });

    // Products by Category Bar Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($categoryLabels ?? []) !!},
            datasets: [{
                label: 'Products',
                data: {!! json_encode($categoryData ?? []) !!},
                backgroundColor: '#B86B1F',
                borderRadius: 5,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            indexAxis: 'x',
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { font: { size: 11 } }
                },
                x: {
                    ticks: { font: { size: 11 } }
                }
            }
        }
    });
</script>
@endsection

