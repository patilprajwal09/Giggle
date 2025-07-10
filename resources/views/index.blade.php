@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section position-relative text-center text-white pb-5" style="background: linear-gradient(rgba(220,53,69,0.7), rgba(220,53,69,0.7)), url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1500&q=80') center/cover no-repeat; min-height: 320px;">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Find Your Dream Job</h1>
            <p class="lead mb-4">Discover the best  jobs or post your own opportunity!</p>
            @guest
                <a href="" class="btn btn-lg btn-outline-light shadow">SIGNUP TO APPLY OR POST A JOB</a>
            @endguest
        </div>
    </div>

    <!-- Search Bar -->
    <div class="container position-relative" style="margin-top: -40px; z-index: 2;">
        <form action="/index" method="GET" class="mx-auto" style="max-width: 600px;">
            <div class="input-group shadow rounded overflow-hidden">
                <span class="input-group-text bg-white border-0"><i class="fa fa-search text-danger"></i></span>
                <input type="text" name="search" class="form-control border-0 py-3" placeholder="Search Laravel Gigs..." value="{{ request('search') }}" />
                <button type="submit" class="btn btn-danger px-4">Search</button>
            </div>
        </form>
    </div>

    <!-- Job Listings -->
    <div class="container my-5">
        <div class="row g-4">
            @if(count($jobRecords) === 0)
                <div class="col-12 text-center text-muted py-5">
                    <h5>No job listings found.</h5>
                </div>
            @endif
            @foreach ($jobRecords as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-lg job-card position-relative transition-transform" style="transition: transform 0.2s;">
                        <img src="{{ asset('storage/logos/' . $item->logo) }}" class="card-img-top p-3 rounded-4" alt="{{ $item->company ? $item->company->name : 'N/A' }}" style="height: 120px; object-fit: contain; background: #f8f9fa;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-1">
                                <a href="{{ url('/showJob/' . $item->id) }}" class="text-decoration-none text-dark fw-bold">{{ $item->title }}</a>
                            </h5>
                            <div class="fw-bold text-danger mb-2">
                                <i class="bi bi-building"></i>
                                {{ $item->company ? $item->company->name : 'N/A' }}
                            </div>
                            <div class="mb-2 text-muted small">
                                <i class="bi bi-geo-alt-fill me-1"></i>
                                {{ $item->company ? $item->company->city : 'N/A' }}
                            </div>
                            <a href="{{ url('/applyNow/'.$item->id) }}" class="btn btn-success mt-auto w-100">Apply Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .job-card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 32px rgba(220,53,69,0.15);
        }
        .hero-section {
            box-shadow: 0 4px 24px rgba(220,53,69,0.12);
        }
    </style>
@endsection
