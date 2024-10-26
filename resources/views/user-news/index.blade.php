@extends('layouts.app-user')

<section id="news-list" class="news-list">
    <div class="container mx-auto py-32 px-16 lg:px-32">
        <div class="news">
            <img src="{{ asset('/img/news.jpg') }}" alt="News Image" class="w-1/2 object-cover h-1/2 block mx-auto">
            <h4 class="title-date text-xs mt-12">April, 10/26/2024</h4>
            <h4 class="title-news font-bold">HOW TO MAKE YOU HANDSOME</h4>
            <p class="description mt-6 text-sm text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam ratione reprehenderit odit molestias perferendis ea impedit omnis quod nemo blanditiis, eaque architecto neque consectetur consequatur quae eius quibusdam iste voluptates.</p>
        </div>
    </div>
</section>

@section('navbar')
@endsection
