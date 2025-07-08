
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Search Bar -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-8 col-lg-6">
            <form action="/manageJob" method="GET">
                <div class="input-group shadow rounded overflow-hidden">
                    <span class="input-group-text bg-white border-0"><i class="fa fa-search text-danger"></i></span>
                    <input type="text" name="search" class="form-control border-0 py-3" placeholder="Search job listings..." value="{{ request('search') }}" />
                    <button type="submit" class="btn btn-danger px-4">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Manage Jobs Section -->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-danger text-white text-center rounded-4 border-0">
                    <h4 class="mb-0">Manage Job Listings</h4>
                </div>
                <div class="card-body p-4">
                    @if(count($jobRecords) === 0)
                        <div class="text-center py-5">
                            <i class="bi bi-inbox fs-1 text-muted"></i>
                            <h5 class="mt-3 text-muted">No job listings found</h5>
                            <p class="text-muted">You haven't posted any jobs yet.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Job Title</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobRecords as $item)
                                        <tr>
                                            <td class="align-middle">
                                                <div>
                                                    <h6 class="mb-1 fw-bold">{{ $item->title }}</h6>
                                                    <small class="text-muted">{{ $item->company ?? 'N/A' }}</small>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <a href="{{ url('/editJob/' . $item->id) }}" class="btn btn-outline-danger btn-sm shadow">
                                                        <i class="bi bi-pencil me-1"></i>Edit
                                                    </a>
                                                    <a href="{{ url('/deleteJob/' . $item->id) }}" class="btn btn-outline-secondary btn-sm shadow" 
                                                       onclick="return confirm('Are you sure you want to delete this job listing?')">
                                                        <i class="bi bi-trash me-1"></i>Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @extends('layouts.app')

@section('content')
    <main class="container my-5">
        <!-- Search -->
        <form action="/">
            <div class="position-relative border border-2 border-light m-4 rounded">
                <div class="position-absolute top-50 translate-middle-y" style="left: 15px;">
                    <i class="fa fa-search text-secondary"></i>
                </div>
                <input type="text" name="search" class="form-control ps-5 pe-5 py-3 rounded"
                    placeholder="Search Laravel Gigs..." />
                <div class="position-absolute top-50 translate-middle-y" style="right: 10px;">
                    <button type="submit" class="btn btn-danger px-3">
                        Search
                    </button>
                </div>
            </div>
        </form>

        <div class="mx-4">
            <div class="bg-light border border-secondary p-4 rounded">
                <header>
                    <h1 class="text-center fw-bold text-uppercase mb-4">
                        Manage Gigs
                    </h1>
                </header>

                <table class="table table-bordered table-hover">
                    <tbody>
                          @foreach ($jobRecords as $item)
                            <tr>
                                <td class="align-middle">
                                    <a href="show.html" class="text-decoration-none text-dark">
                                        {{ $item->title }}
                                    </a>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="{{ url('/editJob/' . $item->id) }}" class="btn btn-outline-primary">
                                        <i class="fa-solid fa-pen-to-square me-1"></i>Edit
                                    </a>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="{{ url('/deleteJob/' . $item->id) }}" class="btn btn-outline-primary">
                                        <i class="fa-solid fa-pen-to-square me-1"></i>Delete
                                    </a>
                                </td>
                            </tr>
                             @endforeach
                     

                    </tbody>
                </table>
            </div>
        </div>
    </main> --}}
