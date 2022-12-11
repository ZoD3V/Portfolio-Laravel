@extends('layouts.app')
@section('title')
    About
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(function () {
            $('textarea[name=desc]').summernote({height: 200});
        });
    </script>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('About') }}</div>
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>{{!! Session::get('success') !!}}</strong>
                            <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <form id="contactForm" action="{{ route('frontend.about.update') }}" method="post">
                        @csrf
                        @foreach ($about as $data)
                            <div class="mb-3">
                                <label for="name">Title</label>
                                <input class="form-control @error('name') is-invalid @enderror " name="title" type="text" value="{{$data->title}}" placeholder="Enter your name..."/>

                                @error('message')
                                <div class="text-danger small" >{!! $message !!}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="desc">Description</label>
                                <textarea id="summernote" class="form-control text-start  @error('message') is-invalid @enderror" name="desc" type="text" placeholder="Enter your message here..." style="height: 10rem">{{$data->desc}}</textarea>

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
    </div>
</div>
@endsection
