@extends('admin.app')

@section('title')
    Dashboard
@endsection



@section('content')
<div class="container-fluid my-3">
    <div class="row mb-5 g-3">

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

        {{-- categoryCount --}}
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card dashboard-card">
                <div class="card-body target-bg non">
                    <div class="dashboard-icon">
                        <a href="{{ route('categories.index') }}"><i class="ri-shopping-cart-2-line"></i></a>
                    </div>
                    <div class="dashboard-info">
                        <h4 class="target-title">Total Categories</h4>
                        <h3 class="numbers">{{ $categoryCount }} +</h3>
                        <a href="{{ route('categories.index') }}">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>


        {{-- Subcategories --}}
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card dashboard-card">
                <div class="card-body target-bg">
                    <div class="dashboard-icon">
                        <a href="{{ route('subcategories.index') }}"><i class="ri-bank-card-line"></i></a>
                    </div>
                    <div class="dashboard-info">
                        <h4 class="target-title">Total Subcategories</h4>
                        <h3 class="numbers">{{ $subcategoryCount }} +</h3>
                        <a href="{{ route('subcategories.index') }}">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection

