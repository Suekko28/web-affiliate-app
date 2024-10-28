<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="@yield('theme', 'light')" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    @include('layouts.head')
    <title>@yield('title', 'Admin OGI')</title>
    @yield('css')
    <link rel="website icon" type="png" href="{{ 'img/small-logo.jpg' }}">
</head>

</head>

<body class="link-sidebar">
    <!-- Preloader -->
    {{-- <div class="preloader">
        <img src="{{ asset('img/small-logo.jpg') }}" alt="loader" class="lds-ripple img-fluid" />
    </div> --}}
    <div id="main-wrapper">

                <div id="main-wrapper">
                        <aside class="left-sidebar with-vertical">
                            <div>@include('layouts.sidebar')</div>
                        </aside>

                        <div class="page-wrapper">
                            <!-- Header Start -->
                            <header class="topbar">
                                <div class="with-vertical">@include('layouts.header')</div>
                                <div class="app-header with-horizontal">@include('layouts.horizontal-header')</div>
                            </header>

                    <!-- Header End -->

                        <aside class="left-sidebar with-horizontal">
                            @include('layouts.horizontal-sidebar')
                        </aside>

                    <div class="body-wrapper">
                        <div class="container-fluid">
                            @yield('pageContent')
                        </div>
                    </div>
                    @include('layouts.customizer')
                </div>

                <x-headers.dd-searchbar />
                <x-headers.dd-shopping-cart />
        </div>
        <div class="dark-transparent sidebartoggler"></div>
        @include('layouts.scripts')
        @yield('scripts')
</body>

</html>
