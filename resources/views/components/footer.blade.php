<footer class="bg-dark text-white py-5 mt-auto" style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);">
    <div class="container text-white">
        <div class="row g-4">
            <!-- Company Info -->
            <div class="col-lg-4 col-md-6">
                <h5 class="fw-bold mb-3 text-danger">LaraGigs</h5>
                <p class="text-white mb-3">Find your dream job or hire the best talent. Connect with opportunities that matter.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white text-decoration-none"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" class="text-white text-decoration-none"><i class="bi bi-twitter fs-5"></i></a>
                    <a href="#" class="text-white text-decoration-none"><i class="bi bi-linkedin fs-5"></i></a>
                    <a href="#" class="text-white text-decoration-none"><i class="bi bi-instagram fs-5"></i></a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-3 text-white">Quick Links</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ url('/index') }}" class="text-white text-decoration-none">Find Jobs</a></li>
                    <li class="mb-2"><a href="{{ url('/addJob') }}" class="text-white text-decoration-none">Post a Job</a></li>
                    <li class="mb-2"><a href="{{ url('/addCompany') }}" class="text-white text-decoration-none">Add Company</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">About Us</a></li>
                </ul>
            </div>
            
            <!-- For Employers -->
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3 text-white">For Employers</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Post a Job</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Browse Candidates</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Pricing Plans</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Employer Resources</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3 text-white">Contact Us</h6>
                <ul class="list-unstyled">
                    <li class="mb-2 text-white"><i class="bi bi-envelope me-2"></i>info@laragigs.com</li>
                    <li class="mb-2 text-white"><i class="bi bi-telephone me-2"></i>+1 (555) 123-4567</li>
                    <li class="mb-2 text-white"><i class="bi bi-geo-alt me-2"></i>123 Job Street, Tech City</li>
                </ul>
            </div>
        </div>
        
        <!-- Bottom Section -->
        <hr class="my-4" style="border-color: #444;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-white mb-0">&copy; 2024 LaraGigs. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ url('/addJob') }}" class="btn btn-danger btn-sm shadow">Post a Job</a>
            </div>
        </div>
    </div>
</footer>