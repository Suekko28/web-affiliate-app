<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Inspired Outfit</title>
</head>

<body>

    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
        <div class="container mx-auto px-16">
            <div class="flex items-center justify-between relative">
                <div class="">
                    <img src="{{ asset('/img/logo.png') }}" alt="Logo OGI" class="py-6 block" width="50"
                        height="50">
                    {{-- <a href="#" class="font-bold text-lg text-primary block py-6">Outfit Guide Indonesia</a> --}}
                </div>
                <div class="flex items-center">
                    <button id="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>

                    <nav id="nav-menu"
                        class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none">
                        <ul class="block lg:flex lg:flex-row">
                            <li class="group">
                                <a href=""
                                    class="text-base text-primary py-2 mx-8 block sm:flex group-hover:text-blue-500">Home</a>
                            </li>
                            <li class="group">
                                <a href=""
                                    class="text-base text-primary py-2 mx-8 block sm:flex group-hover:text-blue-500">Mix&Max</a>
                            </li>
                            <li class="group">
                                <a href=""
                                    class="text-base text-primary py-2 mx-8 block sm:flex group-hover:text-blue-500">News</a>
                            </li>
                        </ul>

                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section class="blog">
        <div class="container mx-auto py-32 px-12">
            <div class="title-product w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="text-lg sm:text-xl lg:text-2xl text-primary">
                        Product
                    </h4>
                </div>
            </div>
            {{-- <div class="flex flex-row flex-wrap justify-start">
                <div class="card m-4 ">
                    <div class="max-w-sm bg-white shadow-md rounded rounded-lg">
                        <img src="{{ asset('/img/compass.png') }}" alt="Logo OGI">
                        <div class="p-6">
                            <h6 class="code-product mb-2">#1</h6>
                            <h4 class="title-product mb-2">Compass Retrograde</h4>
                            <div class="flex flex-row space-x-2"> <!-- Add space between buttons -->
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card m-4">
                    <div class="max-w-sm bg-white shadow-md rounded rounded-lg">
                        <img src="{{ asset('/img/compass.png') }}" alt="Logo OGI">
                        <div class="p-6">
                            <h6 class="code-product mb-2">#1</h6>
                            <h4 class="title-product mb-2">Compass Retrograde</h4>
                            <div class="flex flex-row space-x-2">
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-4">
                    <div class="max-w-sm bg-white shadow-md rounded rounded-lg">
                        <img src="{{ asset('/img/compass.png') }}" alt="Logo OGI">
                        <div class="p-6">
                            <h6 class="code-product mb-2">#1</h6>
                            <h4 class="title-product mb-2">Compass Retrograde</h4>
                            <div class="flex flex-row space-x-2">
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-4">
                    <div class="max-w-sm bg-white shadow-md rounded rounded-lg">
                        <img src="{{ asset('/img/compass.png') }}" alt="Logo OGI">
                        <div class="p-6">
                            <h6 class="code-product mb-2">#1</h6>
                            <h4 class="title-product mb-2">Compass Retrograde</h4>
                            <div class="flex flex-row space-x-2">
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-4">
                    <div class="max-w-sm bg-white shadow-md rounded rounded-lg">
                        <img src="{{ asset('/img/compass.png') }}" alt="Logo OGI">
                        <div class="p-6">
                            <h6 class="code-product mb-2">#1</h6>
                            <h4 class="title-product mb-2">Compass Retrograde</h4>
                            <div class="flex flex-row space-x-2">
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-4">
                    <div class="max-w-sm bg-white shadow-md rounded rounded-lg">
                        <img src="{{ asset('/img/compass.png') }}" alt="Logo OGI">
                        <div class="p-6">
                            <h6 class="code-product mb-2">#1</h6>
                            <h4 class="title-product mb-2">Compass Retrograde</h4>
                            <div class="flex flex-row space-x-2">
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                                <button class="bg-primary rounded text-white px-6">Shopee</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="flex flex-wrap">
                <div class="card w-full px-4 lg:w-1/2 xl:w-1/3">
                    <div class="card-body">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10">
                            <img src="{{ asset('/img/compass.png') }}" alt="Logo OGI" class="w-full">
                            <div class="py-8 px-6">
                                <h6 class="code-product mb-2">#1</h6>
                                <h4 class="title-product mb-2">Compass Retrograde</h4>
                                <div class="flex flex-row space-x-2">
                                    <a href="" class="p-2 rounded-xl hover:bg-slate-200">
                                        <img src="{{ asset('/img/shopee.svg') }}" alt="">
                                    </a>
                                    <a href="" class="p-2 rounded-xl hover:bg-slate-200">
                                        <img src="{{ asset('/img/tokopedia.svg') }}" alt="">
                                    </a>
                                    <a href="" class="p-2 rounded-xl hover:bg-slate-200">
                                        <img src="{{ asset('/img/tiktok.svg') }}" alt="">
                                    </a>
                                    {{-- <button class="bg-primary rounded text-white px-6">Shopee</button>
                                    <button class="bg-primary rounded text-white px-6">Shopee</button>
                                    <button class="bg-primary rounded text-white px-6">Shopee</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card w-full px-4 lg:w-1/2 xl:w-1/3">
                    <div class="card-body">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10">
                            <img src="{{ asset('/img/compass.png') }}" alt="Logo OGI" class="w-full">
                            <div class="py-8 px-6">
                                <h6 class="code-product mb-2">#1</h6>
                                <h4 class="title-product mb-2">Compass Retrograde</h4>
                                <div class="flex flex-row space-x-2">
                                    <a href="" class="p-2 rounded-xl hover:bg-slate-200">
                                        <img src="{{ asset('/img/shopee.svg') }}" alt="">
                                    </a>
                                    <a href="" class="p-2 rounded-xl hover:bg-slate-200">
                                        <img src="{{ asset('/img/tokopedia.svg') }}" alt="">
                                    </a>
                                    <a href="" class="p-2 rounded-xl hover:bg-slate-200">
                                        <img src="{{ asset('/img/tiktok.svg') }}" alt="">
                                    </a>
                                    {{-- <button class="bg-primary rounded text-white px-6">Shopee</button>
                                    <button class="bg-primary rounded text-white px-6">Shopee</button>
                                    <button class="bg-primary rounded text-white px-6">Shopee</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card w-full px-4 lg:w-1/2 xl:w-1/3">
                    <div class="card-body">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10">
                            <img src="{{ asset('/img/compass.png') }}" alt="Logo OGI" class="w-full">
                            <div class="py-8 px-6">
                                <h6 class="code-product mb-2">#1</h6>
                                <h4 class="title-product mb-2">Compass Retrograde</h4>
                                <div class="flex flex-row space-x-2">
                                    <a href="" class="p-2 rounded-xl hover:bg-slate-200">
                                        <img src="{{ asset('/img/shopee.svg') }}" alt="">
                                    </a>
                                    <a href="" class="p-2 rounded-xl hover:bg-slate-200">
                                        <img src="{{ asset('/img/tokopedia.svg') }}" alt="">
                                    </a>
                                    <a href="" class="p-2 rounded-xl hover:bg-slate-200">
                                        <img src="{{ asset('/img/tiktok.svg') }}" alt="">
                                    </a>
                                    {{-- <button class="bg-primary rounded text-white px-6">Shopee</button>
                                    <button class="bg-primary rounded text-white px-6">Shopee</button>
                                    <button class="bg-primary rounded text-white px-6">Shopee</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

    </section>


    <script src="{{ asset('dist/js/script.js') }}"></script>

</body>

</html>
