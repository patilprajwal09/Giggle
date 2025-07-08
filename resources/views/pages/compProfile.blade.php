@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-danger text-white text-center rounded-4 border-0">
                    <h4 class="mb-0">Company Profile</h4>
                </div>
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        @if($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="img-fluid rounded-4 shadow-sm" style="max-height: 150px; object-fit: contain;">
                        @else
                            <div class="bg-light rounded-4 p-4 d-inline-block">
                                <i class="bi bi-building fs-1 text-muted"></i>
                                <p class="text-muted mb-0 mt-2">No Logo</p>
                            </div>
                        @endif
                    </div>
                    <h5 class="mb-4 text-center fw-bold text-danger">{{ $company->name }}</h5>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <i class="bi bi-envelope text-danger me-3 fs-5"></i>
                                <div>
                                    <small class="text-muted d-block">Email</small>
                                    <strong>{{ $company->email }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <i class="bi bi-telephone text-danger me-3 fs-5"></i>
                                <div>
                                    <small class="text-muted d-block">Phone</small>
                                    <strong>{{ $company->phone }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <i class="bi bi-geo-alt text-danger me-3 fs-5"></i>
                                <div>
                                    <small class="text-muted d-block">Address</small>
                                    <strong>{{ $company->address }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <i class="bi bi-building text-danger me-3 fs-5"></i>
                                <div>
                                    <small class="text-muted d-block">City</small>
                                    <strong>{{ $company->city }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <i class="bi bi-map text-danger me-3 fs-5"></i>
                                <div>
                                    <small class="text-muted d-block">State</small>
                                    <strong>{{ $company->state }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Company Profile</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        @if($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="img-fluid rounded" style="max-height: 120px;">
                        @else
                            <span class="text-muted">No Logo</span>
                        @endif
                    </div>
                    <h5 class="mb-3 text-center">{{ $company->name }}</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Email:</strong> {{ $company->email }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $company->phone }}</li>
                        <li class="list-group-item"><strong>Address:</strong> {{ $company->address }}</li>
                        <li class="list-group-item"><strong>City:</strong> {{ $company->city }}</li>
                        <li class="list-group-item"><strong>State:</strong> {{ $company->state }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
