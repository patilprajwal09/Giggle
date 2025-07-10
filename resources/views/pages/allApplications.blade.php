@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-danger text-white text-center rounded-4 border-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">All Job Applications</h4>
                            <span class="badge bg-light text-dark">{{ isset($applications) ? count($applications) : 0 }} Applications</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        @if (isset($applications) && count($applications) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Applicant</th>
                                            <th>Job Title/Role</th>
                                            {{-- <th>Company</th> --}}
                                            <th>Applied On</th>
                                            <th>Resume</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($applications as $application)
                                            <tr>
                                                <td>
                                                    <div>
                                                        <strong>{{ $application->user->name ?? 'N/A' }}</strong>
                                                        <br>
                                                        <small class="text-muted">{{ $application->user->email ?? 'N/A' }}</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <strong>{{ $application->listing ? $application->listing->title : 'N/A' }}</strong>
                                                </td>
                                                {{-- <td>
                                                    {{ $application->listing && $application->listing->company ? $application->listing->company->name : 'N/A' }}
                                                </td> --}}
                                                <td>
                                                    <small class="text-muted">
                                                        {{ \Carbon\Carbon::parse($application->created_at)->format('F j, Y') }}
                                                        <br>
                                                        <span class="text-danger">{{ \Carbon\Carbon::parse($application->created_at)->format('g:i a') }}</span>
                                                    </small>
                                                </td>
                                                <td>
                                                    @if ($application->resume)
                                                        @php
                                                            // Check if the file exists in storage/app/public
                                                            $resumePath = storage_path('app/public/' . $application->resume);
                                                        @endphp
                                                        @if (file_exists($resumePath))
                                                        <a href="{{ route('applications.viewResume', $application->id) }}"
                                                            target="_blank" class="btn btn-sm btn-outline-danger shadow">
                                                             <i class="bi bi-file-earmark-text me-1"></i> View Resume
                                                         </a>
                                                        @else
                                                            <span class="text-danger">Resume file not found</span>
                                                        @endif
                                                    @else
                                                        <span class="text-muted">No resume</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($application->status == 'pending')
                                                        <div class="d-flex gap-2">
                                                            <form action="{{ route('allApplications.approveStatus', $application->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                <input type="hidden" name="status" value="Accepted">
                                                                <button type="submit" class="btn btn-success btn-sm shadow">Accept</button>
                                                            </form>
                                                            <form action="{{ route('allApplications.rejectStatus', $application->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                <input type="hidden" name="status" value="Rejected">
                                                                <button type="submit" class="btn btn-danger btn-sm shadow">Reject</button>
                                                            </form>
                                                        </div>
                                                    @elseif($application->status == 'Accepted')
                                                        <span class="badge bg-success">Accepted</span>
                                                    @elseif($application->status == 'Rejected')
                                                        <span class="badge bg-danger">Rejected</span>
                                                    @endif
                                                    {{-- @if ($application->listing)
                                                        <a href="{{ url('/showJob/' . $application->listing->id) }}" class="btn btn-sm btn-outline-danger mt-2">
                                                            <i class="bi bi-eye me-1"></i> View Job
                                                        </a>
                                                    @endif --}}
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
                                <p class="text-muted">No job applications have been submitted yet.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
