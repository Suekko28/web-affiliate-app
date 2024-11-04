<!-- ---------------------------------- -->
<!-- Start Vertical Layout Sidebar -->
<!-- ---------------------------------- -->
<div class="brand-logo d-flex align-items-center justify-content-center">
    <a href="" class="text-nowrap logo-img">
        <img src="{{ asset('img/logo.png') }}" alt="logo" width="50" height="50">
    </a>
    <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
        <i class="ti ti-x"></i>
    </a>
</div>

<nav class="sidebar-nav scroll-sidebar" data-simplebar>
    <ul id="sidebarnav">
        <!-- ---------------------------------- -->
        <!-- Home -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" aria-expanded="false" {{ request()->is('dashboard') ? 'active' : '' }} href="{{route('dashboard')}}">
                <span>
                    <i class="fa-solid fa-gauge fa-lg" style="color: #1a1a1a"></i> </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('product') ? 'active' : '' }}" aria-expanded="false" href="{{ route('product.index')}}">
                <span>
                    <i class="fa-solid fa-cart-shopping fa-lg" style="color: #1a1a1a"></i>                
                </span>
                <span class="hide-menu">Product</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('news') ? 'active' : '' }}" aria-expanded="false" href="{{ route('news.index')}}">
                <span>
                    <i class="fa-solid fa-newspaper fa-lg" style="color: #1a1a1a"></i>                
                </span>
                <span class="hide-menu">News</span>
            </a>
        </li>
        <!-- ---------------------------------- -->
        <!-- PAGES -->
        <!-- ---------------------------------- -->
    </ul>
</nav>

{{-- <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
    <div class="hstack gap-3">
        <div class="john-img">
            <img src="{{ URL::asset('build/images/profile/user-1.jpg') }}" class="rounded-circle" width="40"
                height="40" alt="modernize-img" />
        </div>
        <div class="john-title">
            <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
            <span class="fs-2">Designer</span>
        </div>
        <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout"
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
            <i class="ti ti-power fs-6"></i>
        </button>
    </div>
</div> --}}

<!-- ---------------------------------- -->
<!-- Start Vertical Layout Sidebar -->
<!-- ---------------------------------- -->
