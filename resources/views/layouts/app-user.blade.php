<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Inspired Outfit menyediakan panduan mix & match fashion terbaik untuk semua gaya. Temukan produk, tips, dan berita fashion terkini di sini!">
    <meta property="og:title" content="Inspired Outfit - Panduan Mix & Match Fashion di Indonesia">
    <meta property="og:description"
        content="Jelajahi panduan terbaik mix & match fashion untuk semua gaya di Inspired Outfit.">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="website icon" type="png" href="{{ 'img/logo.png' }}">
    @vite('resources/css/style.css')
    <title>Inspired Outfit - Panduan Mix & Match Fashion di Indonesia</title>
</head>
<body>
    <style>
        /* Prevent search icon from shifting when no data message is shown */
        .search-bar .relative {
            position: relative;
        }

        #noDataMessage {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            text-align: center;
            margin-top: 10px;
            display: none;
        }
    </style>

    <!-- Navbar Start !-->
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
        <div class="container mx-auto lg:px-16">
            <div class="flex items-center justify-between relative">
                <div class="">
                    <img src="{{ asset('/img/logo.png') }}" alt="Logo OGI" class="py-6 block" width="50"
                        height="50">
                    {{-- <a href="#" class="font-bold text-lg text-primary block py-6">Outfit Guide Indonesia</a> --}}
                </div>
                <div class="flex items-center">
                    <button id="hamburger" type="button"
                        class="p-1 rounded block absolute right-4 lg:hidden focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>

                    <nav id="nav-menu"
                        class="hidden absolute py-5 bg-white shadow-lg rounded-lg  w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none">
                        <ul class="block lg:flex lg:flex-row">
                            <li class="group">
                                <a href="{{ url('/') }}"
                                    class="text-base text-primary py-2 mx-8 block sm:flex group-hover:text-hover">Home</a>
                            </li>
                            <li class="group">
                                <a href="{{ route('product-list.index') }}"
                                    class="text-base text-primary py-2 mx-8 block sm:flex group-hover:text-hover">Product</a>
                            </li>
                            <li class="group">
                                <a href="{{ route('mix&max-list.index') }}"
                                    class="text-base text-primary py-2 mx-8 block sm:flex group-hover:text-hover">Mix&Max</a>
                            </li>
                            <li class="group">
                                <a href="{{ route('news-list.index') }}"
                                    class="text-base text-primary py-2 mx-8 block sm:flex group-hover:text-hover">News</a>
                            </li>
                        </ul>

                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Navbar End !-->
    @yield('navbar')

    @extends('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Tombol scroll ke bawah
            $("a[href='#product']").click(function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $("#product").offset().top - 50
                }, 1000);
            });

            // Tombol scroll ke atas
            $("a[href='#mixmax']").click(function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $("#mixmax").offset().top - 50
                }, 1000);
            });

            // Tombol scroll ke atas
            $("a[href='#news']").click(function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $("#news").offset().top - 50
                }, 1000);
            });
        });
    </script>

    <script>
        // Search functionality for News section
        const searchInput = document.getElementById('searchInput');
        const newsCards = document.querySelectorAll('.card');
        const noDataMessage = document.getElementById('noDataMessage');

        searchInput.addEventListener('input', function() {
            const searchText = this.value.toLowerCase();
            let found = false;

            newsCards.forEach(card => {
                const newsTitle = card.querySelector('.title-news')?.innerText.toLowerCase() || '';
                const productTag = card.querySelector('.code-product')?.innerText.toLowerCase() || '';
                const productName = card.querySelector('.title-product')?.innerText.toLowerCase() || '';

                // Check if search text matches any of the criteria
                if (
                    newsTitle.includes(searchText) ||
                    productTag.includes(searchText) ||
                    productName.includes(searchText)
                ) {
                    card.style.display = ''; // Show card
                    found = true;
                } else {
                    card.style.display = 'none'; // Hide card
                }
            });

            // Display "Data tidak ditemukan" if no cards are visible
            noDataMessage.style.display = found ? 'none' : 'block';
        });
    </script>





    <script src="{{ asset('dist/js/script.js') }}"></script>

</body>

</html>
