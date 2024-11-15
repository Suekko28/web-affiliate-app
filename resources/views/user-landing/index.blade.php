@extends('layouts.app-user')

@section('navbar')
    <!-- Product Start !-->
    <section class="product" id="product">
        <div class="container mx-auto py-32 px-16 lg:px-32">
            <div class="title-product w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-12">
                    <h4 class="text-lg sm:text-xl lg:text-2xl text-primary">
                        Product
                    </h4>
                    <div class="w-[75px] h-[2px] my-2 block bg-black mx-auto"></div>
                </div>
            </div>
            <div class="product flex flex-wrap">
                @foreach ($data as $item)
                    @foreach ($item->Product as $itemProduct)
                        <div class="card w-full px-4 lg:w-1/2 xl:w-1/3">
                            <div class="card-body">
                                <div class=" overflow-hidden mb-10">
                                    <a href="">
                                        <img src="{{ asset('' . $itemProduct->image) }}" alt="Logo OGI"
                                            class="w-full object-cover h-[395]">
                                    </a>
                                    <div class="py-8 px-6">
                                        <h6 class="code-product mb-2">{{ $item->tag_product }}</h6>
                                        <h4 class="title-product mb-2">{{ $itemProduct->nama }}</h4>
                                        <div class="flex flex-row space-x-6 mt-2">
                                            @if (!empty($itemProduct->link_shopee) || !empty($itemProduct->link_tokped) || !empty($itemProduct->link_tiktok))
                                                @if (!empty($itemProduct->link_shopee))
                                                    <a href="{{ $itemProduct->link_shopee }}" target="_blank"
                                                        class="rounded">
                                                        <img src="{{ asset('/img/shopee.svg') }}" alt="Shopee"
                                                            class="transition-transform transform hover:scale-110 duration-300 ease-in-out">
                                                    </a>
                                                @endif

                                                @if (!empty($itemProduct->link_tokped))
                                                    <a href="{{ $itemProduct->link_tokped }}" class="rounded">
                                                        <img src="{{ asset('/img/tokopedia.svg') }}" alt="Tokopedia"
                                                            class="transition-transform transform hover:scale-110 duration-300 ease-in-out">
                                                    </a>
                                                @endif

                                                @if (!empty($itemProduct->link_tiktok))
                                                    <a href="{{ $itemProduct->link_tiktok }}" class="rounded">
                                                        <img src="{{ asset('/img/tiktok.svg') }}" alt="Tiktok"
                                                            class="transition-transform transform hover:scale-110 duration-300 ease-in-out">
                                                    </a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach

            </div>
            <div class="more-detail flex justify-center">
                <a href="{{route('product-list.index')}}"
                    class="w-1/2 lg:w-1/3 text-center py-2 border border-black bg-white transition-all hover:shadow-lg text-primary hover:text-white hover:bg-black hover:border-slate-800 focus:text-white">More
                    Detail</a>
            </div>
        </div>
    </section>
    <!-- Product End !-->

    <!-- Mix&Max Start !-->
    <section class="mixmax" id="mixmax">
        <div class="container mx-auto py-16 px-16 lg:px-32">
            <div class="title-product w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-12">
                    <h4 class="text-lg sm:text-xl lg:text-2xl text-primary">
                        Mix & Max
                    </h4>
                    <div class="w-[75px] h-[2px] my-2 block bg-black mx-auto"></div>
                </div>
            </div>
            <div class="mixmax flex flex-wrap">
                @foreach ($dataKategori as $item)
                    @if ($item->Kategori->isNotEmpty() && $item->Kategori->first()->kategori == 2) <!-- Memastikan kategori adalah 2 -->
                        @foreach ($item->Product as $itemProduct)
                            <div class="card w-full px-4 lg:w-1/2 xl:w-1/3">
                                <div class="card-body">
                                    <div class="overflow-hidden mb-10">
                                        <img src="{{ asset('' . $itemProduct->image) }}" alt="Logo OGI"
                                            class="w-full object-cover h-[395]">
                                        <div class="py-8 px-6">
                                            <h6 class="code-mixmax mb-2">{{ $item->tag_product }}</h6>
                                            <h4 class="title-mixmax mb-2">{{ $itemProduct->nama }}</h4>
                                            <div class="badge">
                                                <span class="inline-flex rounded-md bg-black px-2 py-1 text-xs font-md text-white ring-1 ring-inset ring-gray-500/10">
                                                    Mix&Max
                                                </span>
                                            </div>
                                            <div class="flex flex-row space-x-6 mt-2">
                                                @if (!empty($itemProduct->link_shopee) || !empty($itemProduct->link_tokped) || !empty($itemProduct->link_tiktok))
                                                    @if (!empty($itemProduct->link_shopee))
                                                        <a href="{{ $itemProduct->link_shopee }}" target="_blank" class="rounded">
                                                            <img src="{{ asset('/img/shopee.svg') }}" alt="Shopee"
                                                                class="transition-transform transform hover:scale-110 duration-300 ease-in-out">
                                                        </a>
                                                    @endif
                                                    @if (!empty($itemProduct->link_tokped))
                                                        <a href="{{ $itemProduct->link_tokped }}" class="rounded">
                                                            <img src="{{ asset('/img/tokopedia.svg') }}" alt="Tokopedia"
                                                                class="transition-transform transform hover:scale-110 duration-300 ease-in-out">
                                                        </a>
                                                    @endif
                                                    @if (!empty($itemProduct->link_tiktok))
                                                        <a href="{{ $itemProduct->link_tiktok }}" class="rounded">
                                                            <img src="{{ asset('/img/tiktok.svg') }}" alt="Tiktok"
                                                                class="transition-transform transform hover:scale-110 duration-300 ease-in-out">
                                                        </a>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
            <div class="more-detail flex justify-center">
                <a href=""
                    class="w-1/2 lg:w-1/3 text-center py-2 border border-black bg-white transition-all hover:shadow-lg text-primary hover:text-white hover:bg-black hover:border-slate-800 focus:text-white">More
                    Detail</a>
            </div>
        </div>
    </section>
    
    <!-- Mix&Max End !-->

    <!-- News Start !-->
    <section class="news" id="news">
        <div class="container mx-auto py-16 px-16 lg:px-32">
            <div class="title-news w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-12">
                    <h4 class="text-lg sm:text-xl lg:text-2xl text-primary">
                        News
                    </h4>
                    <div class="w-[75px] h-[2px] my-2 block bg-black mx-auto"></div>
                </div>
            </div>
            <div class="news flex flex-wrap">
                @foreach ($dataNews as $item)
                    <div class="card w-full px-4 lg:w-1/2 xl:w-1/3">
                        <div class="card-body">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10">
                                <a href="#">
                                    <img src="{{ asset('' . $item->image) }}" alt="Logo OGI"
                                        class="w-full object-cover h-[250] block">
                                </a>
                                <div class="py-8 px-6">
                                    <h4 class="title-news mb-2 font-bold">{{ $item->judul }}</h4>
                                    <div class="text-sm mb-2">{!! Str::limit($item->deskripsi, 200) !!}</div>
                                    <a class="text-xs hover:text-hover text-secondary" href="#">Continue Read <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="more-detail flex justify-center">
                <a href=""
                    class="w-1/2 lg:w-1/3 text-center py-2 border border-black bg-white transition-all hover:shadow-lg text-primary hover:text-white hover:bg-black hover:border-slate-800 focus:text-white">More
                    Detail</a>
            </div>

        </div>
    </section>
    <!-- News End !-->
@endsection
