@extends('layouts.frontend')

@section('title')
    @if (Session::has('error'))
    { !! Session::get('error') !! }
    @endif
@endsection

@section('content')

    <section class="page-section" id="contact">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7 text-center">
                    @if (session::has('error'))
                        {!! Session::get('error') !!}
                    @else
                        <a href="{{route('frontend.home.index')}}" class="btn btn-dark">
                        <i class="fas fa-home pe-1"></i>Back to home</a>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection


@section('css')
    <style>
        .page-section {
            padding: 12rem 0 6rem 0 !important;
        }
    </style>
@endsection

@section('js')

@endsection