@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-danger text-white text-center rounded-4 border-0">
                    <h4 class="mb-0">Edit Company Profile</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ url('updateCompany/' . $company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="logo" class="form-label fw-semibold">Company Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                            @if($company->logo)
                                <div class="mt-2 text-center">
                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Current Logo" class="img-fluid rounded-3 shadow-sm" style="max-height: 100px; object-fit: contain;">
                                    <small class="text-muted d-block mt-1">Current logo</small>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Company Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}" required placeholder="Example: Tech Solutions Inc">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}" required placeholder="Example: contact@company.com">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label fw-semibold">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $company->phone }}" required placeholder="Example: +1 (555) 123-4567">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label fw-semibold">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $company->address }}" required placeholder="Example: 123 Business Street">
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label fw-semibold">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ $company->city }}" required placeholder="Example: New York">
                        </div>

                        <div class="mb-3">
                            <label for="state" class="form-label fw-semibold">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{ $company->state }}" required placeholder="Example: NY">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger btn-lg shadow">Update Company Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



{{-- @extends('layouts.app')

@section('content')
<main>
    <div class="container mt-5">
        <div class="card shadow-sm p-4 mx-auto" style="max-width: 700px;">
            <header class="text-center mb-4">
                <h2 class="h4 fw-bold text-uppercase">Edit Company</h2>
                <p>Edit Company Profile</p>
            </header>

            <form action="{{ url('updateCompany/' . $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="logo" class="form-label">Company Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                    @if($company->logo)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="img-fluid rounded" style="max-height: 80px;">
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}" required placeholder="Example: Tech Solutions Inc">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}" required placeholder="Example: contact@company.com">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $company->phone }}" required placeholder="Example: +1 (555) 123-4567">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $company->address }}" required placeholder="Example: 123 Business Street">
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ $company->city }}" required placeholder="Example: New York">
                </div>

                <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control" id="state" name="state" value="{{ $company->state }}" required placeholder="Example: NY">
                </div>

                <div class="d-flex align-items-center justify-content-between">
                    <button type="submit" class="btn btn-primary">Update Company Info</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection --}}
