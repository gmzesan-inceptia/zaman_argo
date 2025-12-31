<div class="sidebar sidebar-navigation active">
    <div class="logo_content">
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ asset('frontend/img/logo.png') }}" alt="logo" class="logo_img" style="width: 50px"/>
            <div class="logo_name">
                Zaman's Agro
            </div>
        </a>
    </div>
    <ul class="nav_list ps-0 scrollbar">
        <li class="category-li">
            <span class="link_names">Dashboard</span>
        </li>
        <li>
            <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? ' active-focus' : '' }}">
                <i class="ri-home-4-line"></i>
                <span class="link_names">Dashboard</span>
            </a>
        </li>


        <li class="category-li">
            <span class="link_names">Main</span>
        </li>

        <li>
            <a href="{{ route('categories.index') }}"
            class="{{ Route::is('categories.*') ? 'active-focus' : '' }}">
                <i class="ri-list-ordered-2"></i>
                <span class="link_names">Manage Categories</span>
            </a>
        </li>

        {{-- <li>
            <a href="{{ route('subcategories.index') }}"
            class="{{ Route::is('subcategories.*') ? 'active-focus' : '' }}">
                <i class="ri-list-ordered"></i>
                <span class="link_names">Manage Subcategories</span>
            </a>
        </li> --}}

        <li>
            <a href="{{ route('products.index') }}"
            class="{{ Route::is('products.*') ? 'active-focus' : '' }}">
                <i class="ri-product-hunt-line"></i>
                <span class="link_names">Manage Products</span>
            </a>
        </li>

        <li>
            <a href="{{ route('orders.index') }}"
            class="{{ Route::is('orders.*') ? 'active-focus' : '' }}">
                <i class="ri-shopping-bag-2-line"></i>
                <span class="link_names">Manage Orders</span>
            </a>
        </li>

        <li>
            <a href="{{ route('contacts.index') }}"
            class="{{ Route::is('contacts.*') ? 'active-focus' : '' }}">
                <i class="ri-message-3-line"></i>
                <span class="link_names">Contact Messages</span>
            </a>
        </li>

    </ul>

    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">

                @if (Auth::user()->image)
                    <img id="sidebarImageDB" src="{{ asset(Auth::user()->image) }}" alt="img" width="30"
                        height="30" class="rounded-circle">
                @else
                    <i class="ri-user-3-line profile-icon"></i>
                @endif

                <div class="name_job">
                    <div class="name">{{ Auth::user()->name }}</div>
                    <div class="job">{{ Auth::user()->designation }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="d-flex"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="ri-logout-box-r-line" id="log_out"></i>
                </a>
            </form>
        </div>
    </div>
</div>
