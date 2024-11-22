@extends('layouts.app-user')

@section('navbar')
    <style>
        .description-news img {
            display: none;
        }
    </style>
    <!-- News Start !-->
    <section class="news" id="news">
        <div class="container mx-auto pt-32 px-16 lg:px-32">
            <div class="title-news w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-12">
                    <h4 class="text-lg sm:text-xl lg:text-2xl text-primary">
                        News
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
                            placeholder="Search News (Title)" required />
                        <div id="noDataMessage" class="alert alert-warning" style="display: none;">
                            Data tidak ditemukan.
                        </div>
                    </div>
                </div>
            </div>
            <div class="news flex flex-wrap">
                @foreach ($data as $item)
                    <div class="card w-full px-4 py-4 lg:w-1/2 xl:w-1/3">
                        <div class="card-body">
                            <div class="bg-white shadow-lg overflow-hidden mb-10">
                                <a href="#">
                                    <img src="{{ asset('' . $item->image) }}" alt="Logo OGI"
                                        class="w-full object-cover h-[250] block ">
                                </a>
                                <div class="py-8 px-6">
                                    <h4 class="title-news font-bold">{{ $item->judul }}</h4>
                                    <div class="date-news text-xs mb-2">
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</div>
                                    <div class="text-sm text-gray-700 mb-2 description-news">{!! Str::limit($item->deskripsi, 300) !!}</div>
                                    <a class="text-sm hover:text-hover text-secondary"
                                        href="{{ route('news-show.show', $item->slug) }}">Continue Read <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination mb-6">{{$data->links()}}</div>
        </div>
    </section>
    <!-- News End !-->
@endsection
