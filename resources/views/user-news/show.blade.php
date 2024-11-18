@extends('layouts.app-user')

@section('navbar')
    <!-- News Start !-->
    <section class="news ">
        <div class="container mx-auto py-32 px-16 lg:px-32">
            <div class="title-news w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-12">
                    <h4 class="text-lg sm:text-xl lg:text-2xl text-primary mb-6">
                        {{ $data->judul }}
                    </h4>
                    <img src="{{ asset('' . $data->image) }}" alt="Logo OGI" class="w-full object-cover h-auto block">
                </div>
                <div class="news">
                    <div class="py-8 px-6">
                        <div class="text-sm text-gray-700 mb-2">{!! ($data->deskripsi) !!}</div>
                    </div>
                </div>

            </div>
    </section>
    <!-- News End !-->
@endsection
