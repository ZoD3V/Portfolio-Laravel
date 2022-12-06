@extends('layouts.app')
@section('title')
    About
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('javascript')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
@endsection

@section('content')
<div class="container">
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <form id="contactForm" action="{{ route('frontend.about.update') }}" method="post">
                    @csrf
                    @foreach ($about as $data)
                        <div class="form-floating mb-3">
                            <input class="form-control @error('name') is-invalid @enderror " name="title" type="text" value="{{$data->title}}" placeholder="Enter your name..."/>
                            <label for="name">Title</label>
                            @error('message')
                            <div class="text-danger small" >{!! $message !!}</div>
                            @enderror
                        </div>


                        <div class="form-floating mb-3">
                            <textarea class="form-control text-start  @error('message') is-invalid @enderror" name="desc" type="text" placeholder="Enter your message here..." style="height: 10rem">{{$data->desc}}</textarea>
                            <label for="message">Description</label>
                            @error('message')
                            <div class="text-danger small" >{!! $message !!}</div>
                             @enderror
                        </div>
                    @endforeach


                    <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
