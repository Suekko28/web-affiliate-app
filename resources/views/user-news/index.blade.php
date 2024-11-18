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
            </div>
            <div class="news flex flex-wrap">
                @foreach ($data as $item)
                    <div class="card w-full px-4 py-4 lg:w-1/2 xl:w-1/3">
                        <div class="card-body">
                            <div class="bg-white shadow-lg overflow-hidden mb-10">
                                <a href="#">
                                    <img src="{{ asset('' . $item->image) }}" alt="Logo OGI"
                                        class="w-full object-cover h-[250] block">
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
