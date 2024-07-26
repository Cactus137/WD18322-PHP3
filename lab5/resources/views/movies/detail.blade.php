<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
</div>
@extends('layout')

@section('title', 'Movies')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header" style="background: white !important">

                <a href="{{ route('movies.list') }}" class="ms-2 text-decoration-none text-dark">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    Back
                </a>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('storage/public/movies/' . $movie->poster) }}" class="p-4 img-fluid rounded"
                        alt="{{ $movie->title }}">
                </div>
                <div class="col-md-8 d-flex align-items-start"> 
                    <div class="py-3">
                        <p class="card-text h3 fw-bold mb-4">{{ $movie->title }}</p>
                        <p class="card-text fst-italic">{{ $movie->intro }}</p>
                        <p class="card-text"><strong>Released:</strong> {{ $movie->release_date }}</p>
                        <p class="card-text"><strong>Genre:</strong> {{ $movie->genre->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
