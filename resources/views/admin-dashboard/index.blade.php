@extends('layouts.master')

@section('title', 'Admin OGI')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/prismjs/themes/prism-okaidia.min.css') }}">
@endsection

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Dashboard', 'subtitle' => 'Home'])
    <!-- Row -->
    {{-- <div class="row">
        <div class="col-12">
            <!-- 1. card with img -->
            <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                <h4 class="mb-0 fs-5">Card with Image</h4>
                <div class="ms-auto flex-shrink-0">
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-4 col-md-6">
            <!-- Card -->
            <div class="card">
                <img class="card-img-top img-responsive" src="{{ asset('assets/dashboard-img1.png') }}"
                    alt="Card image cap" />
                <div class="card-body">
                    <h4 class="card-title">Wedding Design 1</h4>
                    <p class="card-text">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam laudantium dolores
                        architecto ipsam enim odio veniam ea labore est tempora atque accusantium placeat fuga quam
                        voluptas, fugiat soluta commodi quos? </p>
                    <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <!-- Card -->
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-4 col-md-6">
            <!-- Card -->
            <div class="card">
                <img class="card-img-top img-responsive" src="{{ asset('assets/dashboard-img2.png') }}"
                    alt="Card image cap" />
                <div class="card-body">
                    <h4 class="card-title">Wedding Design 2</h4>
                    <p class="card-text">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam laudantium dolores
                        architecto ipsam enim odio veniam ea labore est tempora atque accusantium placeat fuga quam
                        voluptas, fugiat soluta commodi quos?
                    </p>
                    <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <!-- Card -->
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-4 col-md-6">
            <!-- Card -->
            <div class="card">
                <img class="card-img-top img-responsive" src="{{ asset('assets/dashboard-img3.png')}}"
                    alt="Card image cap" />
                <div class="card-body">
                    <h4 class="card-title">Wedding Design 3</h4>
                    <p class="card-text">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam laudantium dolores
                        architecto ipsam enim odio veniam ea labore est tempora atque accusantium placeat fuga quam
                        voluptas, fugiat soluta commodi quos? </p>
                    <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <!-- Card -->
        </div>

    </div> --}}
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/js/widget/ui-card-init.js') }}"></script>
@endsection
