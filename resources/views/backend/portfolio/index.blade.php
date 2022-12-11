@extends('layouts.app')

@section('title')
    Portfolio
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('javascript')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready( function () {
        $('table').DataTable({
            "pageLength" : 50
        })
    });
    </script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Portfolio') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table id="table" class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">title</th>
                            <th scope="col">image</th>
                            <th scope="col">description</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($portfolio as $item)
                          <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{ $item->title }}</td>
                            <td><img src="{{ asset('public/portfolio/').$item->image }}" class="img-thumbnail img-fluid"></td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary"><i class="fas fa-search pe-1"></i>Show</a>
                                <a href="" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt pe-1"></i>Edit</a>
                                <form action="" class="d-inline" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt pe-1"></i>Destroy
                                    </button>
                                </form>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
