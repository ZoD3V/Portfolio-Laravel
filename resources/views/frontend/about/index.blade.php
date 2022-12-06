@extends('layouts.frontend')

@section('title')
    About Me
@endsection

@section('content')
<!-- About Section-->
<section class="page-section bg-primary text-white mb-0" id="about">
    @foreach ($about as $data)


    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">{{$data->title}}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="row-lg-4 ms-auto"><p class="lead">{{$data->desc}}</p></div>

        </div>
        <!-- About Section Button-->
        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-light" href="https://drive.google.com/file/d/178XZ7XYvMGhh-l3s3kVAunCKAx8-cHaM/view?usp=sharing">
                <i class="fas fa-download me-2"></i>
                Download My Curriculum Vitae
            </a>
        </div>
    </div>

    @endforeach
</section>
@endsection

@section('css')
    <style>
        .page-section {
            padding: 13rem 0 6rem 0 !important
        }
    </style>
@endsection
