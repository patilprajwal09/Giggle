@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section position-relative text-center text-white py-5" style="background: linear-gradient(rgba(220,53,69,0.7), rgba(220,53,69,0.7)), url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1500&q=80') center/cover no-repeat; min-height: 400px;">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Welcome to LaraGigs</h1>
            <p class="lead mb-5">Connect with opportunities that matter</p>
            <h2 class="h3 mb-5 fw-bold">What are you looking for?</h2>
            <div class="d-flex gap-4 flex-wrap justify-content-center">
                <a href="{{ route('addCompany') }}" class="btn btn-lg btn-outline-light px-5 py-3 shadow rounded-pill fw-semibold">
                    <i class="bi bi-building me-2"></i>I want to hire
                </a>
                <a href="{{ route('index') }}" class="btn btn-lg btn-light px-5 py-3 shadow rounded-pill fw-semibold text-danger">
                    <i class="bi bi-briefcase me-2"></i>I want a job
                </a>
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .hero-section {
            box-shadow: 0 4px 24px rgba(220,53,69,0.12);
        }
        .btn:hover {
            transform: translateY(-2px);
            transition: transform 0.2s;
        }
    </style>
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 60vh;">
    <h2 class="mb-5 fw-bold text-center">What are you looking for?</h2>
    <div class="d-flex gap-4 flex-wrap justify-content-center">
        <a href="{{ route('addCompany') }}" class="btn btn-lg btn-primary px-5 py-3 shadow rounded-pill fw-semibold">I want to hire</a>
        <a href="{{ route('index') }}" class="btn btn-lg btn-success px-5 py-3 shadow rounded-pill fw-semibold">I want a job</a>
    </div>
</div>
@endsection --}}
