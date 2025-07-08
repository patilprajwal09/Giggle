@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-danger text-white text-center rounded-4 border-0">
                    <h4 class="mb-0">Edit Job Listing</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{url('/updateJob/'.$listings->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="company" class="form-label fw-semibold">Company Name</label>
                            <input type="text" class="form-control" name="company" value="{{$listings->company}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Job Title</label>
                            <input type="text" class="form-control" name="title" value="{{$listings->title}}" placeholder="Example: Senior Laravel Developer" required>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label fw-semibold">Job Location</label>
                            <input type="text" class="form-control" name="location" value="{{$listings->location}}" placeholder="Example: Remote, Boston MA, etc" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Contact Email</label>
                            <input type="email" class="form-control" name="email" value="{{$listings->email}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="website" class="form-label fw-semibold">Website/Application URL</label>
                            <input type="url" class="form-control" name="website" value="{{$listings->website}}" required>
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label fw-semibold">Company Logo</label>
                            <input type="file" class="form-control" name="logo">
                            @if($listings->logo)
                                <div class="mt-2 text-center">
                                    <img src="{{ asset('storage/' . $listings->logo) }}" alt="Current Logo" class="img-fluid rounded-3 shadow-sm" style="max-height: 100px; object-fit: contain;">
                                    <small class="text-muted d-block mt-1">Current logo</small>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">Job Description</label>
                            <textarea class="form-control" name="description" rows="6" placeholder="Include tasks, requirements, salary, etc" required>{{$listings->description}}</textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger btn-lg shadow">Update Job Listing</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- 
@extends('layouts.app')

@section('content')
   <main>
    <div class="container mt-5">
        <div class="card shadow-sm p-4 mx-auto" style="max-width: 700px;">
            <header class="text-center mb-4">
                <h2 class="h4 fw-bold text-uppercase">Edit Gig</h2>
                <p>Edit: Senior Developer</p>
            </header>

            <form action="post" action="{{url('/updateJob/'.$listings->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="company" class="form-label">Company Name</label>
                    <input type="text" class="form-control" name="company" value="{{$listings->company}}">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Job Title</label>
                    <input type="text" class="form-control" name="title" value="{{$listings->title}}" placeholder="Example: Senior Laravel Developer">
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Job Location</label>
                    <input type="text" class="form-control" name="location" value="{{$listings->location}}" placeholder="Example: Remote, Boston MA, etc">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Contact Email</label>
                    <input type="email" class="form-control" name="email" value="{{$listings->email}}">
                </div>

                <div class="mb-3">
                    <label for="website" class="form-label">Website/Application URL</label>
                    <input type="url" class="form-control" name="website" value="{{$listings->website}}">
                </div>


                <div class="mb-3">
                    <label for="logo" class="form-label">Company Logo</label>
                    <input type="file" class="form-control" name="logo" value="{{$listings->logo}}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Job Description</label>
                    <textarea class="form-control" name="description" rows="8" placeholder="Include tasks, requirements, salary, etc" value="{{$listings->description}}">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi ipsam quae repellat adipisci quas id? Optio saepe, maxime tempora tenetur iste ratione necessitatibus. Corrupti eveniet distinctio quaerat voluptas itaque sequi molestias assumenda fugiat minus in dicta perferendis, autem velit nihil, at, atque a placeat voluptates? Culpa quia vel laborum nemo.</textarea>
                </div>

                <div class="d-flex align-items-center justify-content-between">
                    <button type="submit" class="btn btn-danger">update</button>
                   
                </div>
            </form>
        </div>
    </div>
</main>
@endsection --}}
