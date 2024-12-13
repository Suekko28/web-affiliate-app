<!--  Mobilenavbar -->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <nav class="sidebar-nav scroll-sidebar">
        <div class="offcanvas-header justify-content-between">
            <img src="{{ asset('img/logo.png') }}" alt="modernize-img" class="img-fluid" width="50" height="50" />
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body h-n80" data-simplebar="" data-simplebar>
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" aria-expanded="false" {{ request()->is('dashboard') ? 'active' : '' }}
                        href="{{ route('dashboard') }}">
                        <span>
                            <i class="fa-solid fa-gauge fa-lg" style="color: #1a1a1a"></i> </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('product') ? 'active' : '' }}" aria-expanded="false"
                        href="{{ route('product.index') }}">
                        <span>
                            <i class="fa-solid fa-cart-shopping fa-lg" style="color: #1a1a1a"></i>
                        </span>
                        <span class="hide-menu">Product</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('news') ? 'active' : '' }}" aria-expanded="false"
                        href="{{ route('news.index') }}">
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
        </div>
    </nav>
</div>
