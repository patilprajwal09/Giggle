@extends('layouts.app')

@section('content')
    <!-- Job Form Section -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-danger text-white text-center rounded-4 border-0">
                        <h4 class="mb-0">Create Job Listing</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{url('storeJob')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Job Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Example: Senior Laravel Developer" required>
                            </div>

                            <div class="mb-3">
                                <label for="salary" class="form-label">Salary</label>
                                <input type="text" class="form-control" id="salary" name="salary"
                                    placeholder="Example: 100000" required>
                            </div>

                            <div class="mb-3">
                                <label for="vacancies" class="form-label">Vacancies</label>
                                <input type="text" class="form-control" id="vacancies" name="vacancies"
                                    placeholder="Example: 1" required>
                            </div>

                            <div class="mb-3">
                                <label for="experience" class="form-label">Experience</label>
                                <input type="text" class="form-control" id="experience" name="experience"
                                    placeholder="Example: 3 years" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Job Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5"
                                    placeholder="Include tasks, requirements, salary, etc" required></textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger btn-lg shadow">Create Job Listing</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
