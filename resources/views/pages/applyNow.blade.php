@extends('layouts.app')

@section('content')
@php
    $company = $company ?? ($listing->company ?? null);
@endphp
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <!-- Job Details Card -->
            <div class="card shadow-lg border-0 rounded-4 mb-4">
                <div class="card-header bg-danger text-white text-center rounded-top-4">
                    <h3 class="mb-0 fw-bold">{{ $listing->title }}</h3>
                </div>
                <div class="row g-0 align-items-center">
                    <div class="col-md-4 d-flex align-items-center justify-content-center p-4">
                        @if($listing->logo)
                            <div class="bg-white rounded-circle shadow d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                <img src="{{ asset('storage/' . $listing->logo) }}" class="img-fluid rounded-circle" alt="{{ $company ? $company->name : 'Company Logo' }}" style="max-height: 80px; object-fit: contain;">
                            </div>
                        @else
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                <i class="bi bi-building fs-1 text-muted"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <div class="mb-3 p-3 bg-light rounded-3">
                                <div class="fw-bold text-danger mb-1"><i class="bi bi-building"></i> {{ $company ? $company->name : 'N/A' }}</div>
                                <div class="mb-1"><i class="bi bi-envelope me-1"></i> <a href="mailto:{{ $company ? $company->email : '#' }}" class="text-decoration-none">{{ $company ? $company->email : 'N/A' }}</a></div>
                                <div class="mb-2 text-muted"><i class="bi bi-geo-alt-fill me-1"></i> {{ $company ? $company->city : 'N/A' }}</div>
                                <div class="d-flex flex-wrap gap-2 mt-2">
                                    <span class="badge bg-danger bg-opacity-10 text-danger fw-semibold"><i class="bi bi-cash-coin me-1"></i>Salary: {{ $listing->salary ?? 'N/A' }}</span>
                                    <span class="badge bg-danger bg-opacity-10 text-danger fw-semibold"><i class="bi bi-people me-1"></i>Vacancies: {{ $listing->vacancies ?? 'N/A' }}</span>
                                    <span class="badge bg-danger bg-opacity-10 text-danger fw-semibold"><i class="bi bi-briefcase me-1"></i>Experience: {{ $listing->experience ?? 'N/A' }}</span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h5 class="fw-bold mb-2 text-danger">Job Description</h5>
                                <div class="bg-light p-3 rounded-3" style="max-height: 180px; overflow-y: auto;">
                                    {{ $listing->description }}
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="mailto:{{ $listing->email }}" class="btn btn-outline-danger flex-fill"><i class="bi bi-envelope me-2"></i>Contact</a>
                                @if($listing->website)
                                <a href="{{ $listing->website }}" target="_blank" class="btn btn-outline-secondary flex-fill"><i class="bi bi-globe me-2"></i>Website</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Application Form Card -->
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-danger text-white text-center rounded-top-4">
                    <h4 class="mb-0">Apply Now</h4>
                </div>
                <div class="card-body p-4">
                    @if(isset($jobApplication) && $jobApplication)
                        <div class="alert alert-info text-center border-0 rounded-3">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            You have already applied for this job.<br>
                            <small class="text-muted">Applied on: {{ \Carbon\Carbon::parse($jobApplication->created_at)->format('F j, Y, g:i a') }}</small>
                        </div>
                    @else
                        <form action="{{url('storeApplication')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $listing->id }}" name="listingId">
                            <div class="mb-3">
                                <label for="resume" class="form-label fw-semibold">Upload Resume</label>
                                <input type="file" class="form-control" id="resume" name="resume" required>
                                <small class="text-muted">Accepted formats: PDF, DOC, DOCX</small>
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label fw-semibold">Cover Letter / Note</label>
                                <textarea class="form-control" id="note" name="note" rows="4" placeholder="Tell us why you're the perfect fit for this position..."></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger btn-lg shadow">Submit Application</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
