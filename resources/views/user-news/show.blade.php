@extends('layouts.app-user')

@section('navbar')
<style>
    .image .image-resized {
        width: none !important;
    }

    .image_resized {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100% !important;
    }

    .image_resized img {
        width: 350px;
        height: 350px;
        object-fit: cover;
    }
</style>
    <!-- News Start !-->
    <section class="news">
        <div class="container mx-auto py-32 px-16 lg:px-32">
            <div class="title-news w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-12">
                    <h4 class="text-lg sm:text-xl lg:text-2xl text-primary">
                        {{ $data->judul }}
                    </h4>
                    <div class="w-[64] h-[2px] my-3 block bg-black mx-auto"></div>
                    <div class="date-news mb-6 text-xs">POSTED ON {{\Carbon\Carbon::parse($data->created_at)->format('d F Y')}}</div>
                    <img src="{{ asset('' . $data->image) }}" alt="Logo OGI" class="w-full object-cover h-auto block">
                </div>
                <div class="detail-news">
                    <div class="py-8 px-6">
                        <div class="text-sm text-gray-700 mb-2 description-news">{!! ($data->deskripsi) !!}</div>
                    </div>
                </div>

            </div>
    </section>
    <!-- News End !-->
@endsection
