@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-danger text-white text-center rounded-4 border-0">
                    <h4 class="mb-0">Job Details</h4>
                </div>
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        @if($jobRecords->logo)
                            <img src="{{ asset('storage/logos/' . $jobRecords->logo) }}" class="img-fluid rounded-4 shadow-sm mb-3" 
                                 alt="{{ $jobRecords->company }}" style="max-height: 120px; object-fit: contain;">
                        @endif
                        <h3 class="h4 mb-2 fw-bold">{{ $jobRecords->title }}</h3>
                        <div class="h5 fw-bold mb-3 text-danger">
                            <i class="bi bi-building me-2"></i>{{ $jobRecords->company }}
                        </div>
                        <div class="text-muted mb-4">
                            <i class="bi bi-geo-alt-fill me-2"></i>{{ $jobRecords->location }}
                        </div>
                    </div>

                    <hr class="my-4" />

                    <div class="mb-4">
                        <h5 class="fw-bold mb-3 text-danger">Job Description</h5>
                        <div class="bg-light p-3 rounded-3">
                            {{ $jobRecords->description }}
                        </div>
                    </div>

                    <div class="d-grid gap-3">
                        <a href="mailto:{{ $jobRecords->email }}" class="btn btn-danger btn-lg shadow">
                            <i class="bi bi-envelope me-2"></i>Contact Employer
                        </a>
                        <a href="{{ $jobRecords->website }}" target="_blank" class="btn btn-outline-danger btn-lg shadow">
                            <i class="bi bi-globe me-2"></i>Visit Website
                        </a>
                        <a href="{{ url('/applyNow/'.$jobRecords->id) }}" class="btn btn-success btn-lg shadow">
                            <i class="bi bi-send me-2"></i>Apply Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
