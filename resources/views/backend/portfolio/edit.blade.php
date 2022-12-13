@extends('layouts.app')

@section('title')
    Portfolio | Edit
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
            $('input[name=image]').change(function(){
                imagePreview(this);
            });
        });
        function imagePreview(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e){
                    $("#preview").removeClass("d-none");
                    $("#preview").attr("src",e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Portfolio | Edit') }}</div>
                <div class="card-body">
                    <form id="contactForm" action="{{ route('backend.edit.process', ['id'=> Route::current()->parameters['id']])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach ($portfolio as $value)
                            <div class="row">
                             <div class="form-control">
                                <div class="col-xs-12 col-sm-12  col-md-12 mb-3">
                                    <div class="form-group mb-3">
                                        <div class="mb-2 @error('title')
                                        text-danger fw-bold
                                        @enderror">
                                        Title:
                                        </div>
                                        <input type="text" name="title" value="{{ $value->title }}" placeholder="Title"
                                        class="form-control">
                                        @error('title')
                                        text-danger is-invalid
                                        @enderror
                                    </div>
                                    @error('title')
                                    <div class="text-danger small" >{!! $message !!}</div>
                                    @enderror
                                    <div class="mb-3">
                                        <label for="filename" class="form-label">
                                            Filename <strong class="text-danger">*</strong>
                                        </label>
                                        <input type="file" name="image" id="image" class="form-control">

                                         <img src="" class="img-thumbnail mt-3 mb-3 d-none w-50" id="preview">

                                        <img src="{{ asset('portfolio/'. $value->image ) }}" class="img-thumbnail mt-3 mb-3 w-50" id="preview">

                                        {{-- <img src="{{ asset('portfolio/'. $value->image ) }}" class=" w-50" alt=""> --}}
                                         @error('image')
                                    <div class="text-danger small" >{!! $message !!}</div>
                                    @enderror
                                    </div>

                                <div class="mb-3">
                                    <div class="mb-2 @error('description') text-danger fw-bold @enderror">Description:</div>
                                    <textarea class="form-control @error('description') text-danger fw-bold @enderror" name="description" placeholder="description">{{ $value->description }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{!! $message !!}</small>
                                    @enderror
                                </div>

                                    <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Edit</button>
                                </div>
                            </div>
                            @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
