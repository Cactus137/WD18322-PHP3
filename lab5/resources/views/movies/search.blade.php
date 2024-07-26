@extends('layout')

@section('title', 'Movies')

@section('content')

    @session('success')
        <div class="toast show mb-2 align-items-center text-white bg-success border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endsession
    @session('error')
        <div class="toast show mb-2 align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endsession
    
    @if ($movies->isEmpty())
        <div class="alert alert-warning" role="alert">
            No movies found.
        </div>
    @else
        <table class="table table-striped mt-5">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Poster</th>
                    <th>Title</th>
                    <th>Released</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr class="text-center">
                        <th scope="row">{{ $movie->id }}</th>
                        <td>
                            <img src="{{ asset('storage/public/movies/' . $movie->poster) }}" width="100" height="200"
                                class="img-thumbnail">
                        </td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td>{{ $movie->genre->name }}</td>
                        <td class="">
                            <div class="d-flex justify-content-around align-items-center">
                                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure delete this movie?')" type="submit"
                                        class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $movies->links() }}
    @endif
@endsection
