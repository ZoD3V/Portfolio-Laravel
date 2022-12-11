@extends('layouts.app')

@section('title')
    Portfolio | Create
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
                <div class="card-header">{{ __('Portfolio | Create') }}</div>
                <div class="card-body">
                    <form id="contactForm" action="{{ route('backend.create.process.portfolio') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12  col-md-12 mb-3">
                                    <div class="form-group mb-3">
                                        <div class="mb-2 @error('title')
                                        text-danger fw-bold
                                        @enderror">
                                        Title:
                                        </div>
                                        <input type="text" name="title" value="{{ old('title') }}" placeholder="Title"
                                        class="form-control
                                        @error('title')
                                        text-danger is-invalid
                                        @enderror>"
                                    </div>
                                    @error('title')
                                    <div class="text-danger small" >{!! $message !!}</div>
                                    @enderror
                                    <div class="mb-3">
                                        <label for="filename" class="form-label">
                                            Filename <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="file" name="filename" id="filename" class="form-control">
                                         @error('image')
                                    <div class="text-danger small" >{!! $message !!}</div>
                                    @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <textarea id="summernote" class="form-control text-start  @error('description') is-invalid @enderror" name="desc" type="text" placeholder="Enter your message here..." style="height: 10rem"></textarea>
                                        <label for="desc">Description</label>
                                        @error('description')
                                            <div class="text-danger small" >{!! $message !!}</div>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Send</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
