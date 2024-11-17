@extends('layouts.app-user')

@section('navbar')
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
                @foreach ($data as $item)
                    <div class="card w-full px-4 lg:w-1/2 xl:w-1/3">
                        <div class="card-body">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10">
                                <a href="#">
                                    <img src="{{ asset('' . $item->image) }}" alt="Logo OGI"
                                        class="w-full object-cover h-[250] block">
                                </a>
                                <div class="py-8 px-6">
                                    <h4 class="title-news mb-2 font-bold">{{ $item->judul }}</h4>
                                    <div class="text-sm mb-2">{!! Str::limit($item->deskripsi, 100) !!}</div>
                                    <a class="text-xs hover:text-hover text-secondary" href="#">Continue Read <i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination flex justify-center w-full space-x-1 mt-6">
                <button
                    class="rounded-md border border-slate-200 py-2 px-3 text-center text-sm transition-all shadow-md hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2">Prev</button>
                <button
                    class="rounded-md border border-slate-200 py-2 px-3 text-center text-sm transition-all shadow-md hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2">1</button>
                <button
                    class="rounded-md border border-slate-200 py-2 px-3 text-center text-sm transition-all shadow-md hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2">2</button>
                <button
                    class="rounded-md border border-slate-200 py-2 px-3 text-center text-sm transition-all shadow-md hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2">3</button>
                <button
                    class="rounded-md border border-slate-200 py-2 px-3 text-center text-sm transition-all shadow-md hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2">Next</button>
            </div>

        </div>
    </section>
    <!-- News End !-->
@endsection
