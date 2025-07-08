@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-danger text-white text-center rounded-4 border-0">
                    <h4 class="mb-0">My Applications</h4>
                </div>
                <div class="card-body p-4">
                    @if(isset($applications) && count($applications) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Applied On</th>
                                        <th>Status</th>
                                        <th>Resume</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($applications as $application)
                                        <tr>
                                            <td>
                                                <strong>{{ $application->listing->title ?? 'N/A' }}</strong>
                                            </td>
                                            <td>{{ $application->listing->company ?? 'N/A' }}</td>
                                            <td>
                                                <small class="text-muted">
                                                    {{ \Carbon\Carbon::parse($application->created_at)->format('F j, Y, g:i a') }}
                                                </small>
                                            </td>
                                            <td>
                                                @if($application->status == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($application->status == 'Accepted')
                                                    <span class="badge bg-success">Accepted</span>
                                                @elseif($application->status == 'Rejected')
                                                    <span class="badge bg-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($application->resume)
                                                    <a href="{{ url('storage/' . $application->resume) }}" 
                                                       target="_blank" 
                                                       class="btn btn-sm btn-outline-danger shadow">
                                                        <i class="bi bi-file-earmark-text me-1"></i>View Resume
                                                    </a>
                                                @else
                                                    <span class="text-muted">No resume</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($application->listing)
                                                    <a href="{{ url('showJob/' . $application->listing->id) }}" class="btn btn-sm btn-outline-danger shadow">
                                                        <i class="bi bi-eye me-1"></i>View Job
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-inbox fs-1 text-muted"></i>
                            <h5 class="mt-3 text-muted">No applications yet</h5>
                            <p class="text-muted">You haven't applied for any jobs yet.</p>
                            <a href="{{ url('/index') }}" class="btn btn-danger shadow">Browse Jobs</a>
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
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">My Applications</h4>
                </div>
                <div class="card-body">
                    
                    @if(isset($applications) && count($applications) > 0)
                   
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Applied On</th>
                                        <th>Status</th>
                                        <th>Resume</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($applications as $application)
                                 
                                        <tr>
                                            <td>
                                                <strong>{{ $application->listing->title??'NA' }}</strong>
                                            </td>
                                            <td>{{ $application->listing->company??'NA' }}</td>
                                            <td>
                                                <small class="text-muted">
                                                    {{ \Carbon\Carbon::parse($application->created_at)->format('F j, Y, g:i a') }}
                                                </small>
                                            </td>
                                            <td>
                                                @if($application->status == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($application->status == 'Accepted')
                                                    <span class="badge bg-success">Accepted</span>
                                                @elseif($application->status == 'Rejected')
                                                    <span class="badge bg-danger">Rejected</span>
                                                {{-- @else
                                                    <span class="badge bg-secondary">{{ $application->status }}</span> --}}
                                                {{-- @endif
                                            </td>
                                            <td>
                                                @if($application->resume)
                                                <a href="{{ url('/storage/' . $application->resume) }}" class="btn btn-sm btn-outline-primary">View Resume</a>
                                                @else
                                                <span class="text-muted">No resume</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($application->listing)
                                                <a href="{{ url('/showJob/' . $application->listing->id) }}" class="btn btn-sm btn-outline-primary">View Job</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-inbox fs-1 text-muted"></i>
                            <h5 class="mt-3 text-muted">No applications yet</h5>
                            <p class="text-muted">You haven't applied for any jobs yet.</p>
                            <a href="{{ url('/index') }}" class="btn btn-primary">Browse Jobs</a>
                        </div>
                    @endif
                </div>
              
            </div>
        </div>
    </div>
</div> --}}
{{-- @endsection --}} 
