@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <!-- Job Details Card -->
            <div class="card shadow-lg border-0 rounded-4 mb-4">
                <div class="row g-0">
                    @if($listing->logo)
                    <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
                        <img src="{{ asset('storage/' . $listing->logo) }}" class="img-fluid rounded" alt="{{ $listing->company }}" style="max-height: 120px; object-fit: contain;">
                    </div>
                    @endif
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-2 fw-bold">{{ $listing->title }}</h5>
                            <div class="fw-bold text-danger mb-2"><i class="bi bi-building"></i> {{ $listing->company }}</div>
                            <div class="mb-2 text-muted">
                                <i class="bi bi-geo-alt-fill me-1"></i> {{ $listing->location }}
                            </div>
                            <div class="mb-2">
                                <i class="bi bi-envelope me-1"></i> <a href="mailto:{{ $listing->email }}" class="text-decoration-none">{{ $listing->email }}</a>
                            </div>
                            <div class="mb-2">
                                <i class="bi bi-globe me-1"></i> <a href="{{ $listing->website }}" target="_blank" class="text-decoration-none">{{ $listing->website }}</a>
                            </div>
                            <div class="mb-2">
                                <i class="bi bi-info-circle me-1"></i> {{ Str::limit($listing->description, 150) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Application Form Card -->
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-danger text-white text-center rounded-4 border-0">
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
