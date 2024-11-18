@extends('layouts.app-user')

@section('navbar')
   
    <!-- Product Start !-->
    <section class="product">
        <div class="container mx-auto pt-32 px-16 lg:px-32">
            <div class="title-product w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-12">
                    <h4 class="text-lg sm:text-xl lg:text-2xl text-primary">
                        Product
                    </h4>
                    <div class="w-[64] h-[2px] my-3 block bg-black mx-auto"></div>
                </div>
                <div class="search-bar">
                    <div class="relative lg:w-1/2 w-full mx-auto mb-12">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="searchInput"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white"
                            placeholder="Search Product (#Tag Product, Name Product)" required />
                        <div id="noDataMessage" class="alert alert-warning" style="display: none;">
                            Data tidak ditemukan.
                        </div>
                    </div>
                </div>
            </div>
            <div class="product flex flex-wrap">
                @foreach ($data as $item)
                    @foreach ($item->Product as $itemProduct)
                        <div class="card w-full px-4 py-4 lg:w-1/2 xl:w-1/3">
                            <div class="card-body">
                                <div class=" overflow-hidden mb-10">
                                    <a href="">
                                        <img src="{{ asset('' . $itemProduct->image) }}" alt="Logo OGI"
                                            class="w-full object-cover h-[300] lg:h-[250] md:h-[620] sm:h-[500] sm:w-3/4 mx-auto">
                                    </a>
                                    <div class="py-6">
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
            <div class="pagination mb-6">{{$data->links()}}</div>
        </div>
    </section>
    <!-- Product End !-->
   
@endsection
