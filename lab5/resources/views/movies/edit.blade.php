<div>
    <!-- Well begun is half done. - Aristotle -->
</div>
@extends('layout')

@section('title', $movie->title)

@section('content')
    <div class="container">
        @session('success')
            <div class="row toast show mb-2 align-items-center text-white bg-success border-0" role="alert" aria-live="assertive"
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
            <div class="row toast show mb-2 align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive"
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
        <div class="row gy-4 mt-4 gy-md-5 gy-lg-0 align-items-md-center border rounded">
            <div class="py-4 text-center">
                <h2 class="fw-bold">Edit Movie</h2>
            </div>

            <form action="{{ route('movies.update', $movie->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                    <div class="col-12">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $movie->title }}">
                        @error('title')
                            <p class="text-danger py-2 m-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4 mt-3">store
                        <label for="genre" class="form-label">Genre <span class="text-danger">*</span></label>
                        <select class="form-select" name="genre_id">
                            <option disabled>-- Select Genre --</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}" {{ $genre->id == $movie->genre_id ? 'selected' : '' }}>
                                    {{ $genre->name }}</option>
                            @endforeach
                        </select>
                        @error('genre_id')
                            <p class="text-danger py-2 m-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4 mt-3">
                        <label for="poster" class="form-label">Poster <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" id="poster" name="poster">
                        @error('poster')
                            <p class="text-danger py-2 m-0">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-12 col-md-4 mt-3">
                        <label for="release_date" class="form-label">Released <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" id="release_date" name="release_date"
                            value="{{ $movie->release_date }}">
                        @error('release_date')
                            <p class="text-danger py-2 m-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 mt-3">
                        <label for="intro" class="form-label">Intro <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="intro" name="intro" rows="3">{{ $movie->intro }}</textarea>
                        @error('intro')
                            <p class="text-danger py-2 m-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 mt-3">
                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
