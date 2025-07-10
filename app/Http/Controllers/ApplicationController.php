<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Company;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $listingId)
    {
        $user = $request->user();
        $listing = Listing::find($listingId);
        $jobApplication = Application::where('user_id', $user->id)->where('listing_id', $listingId)->first();

        return view('pages.applyNow', compact('jobApplication', 'listing'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $filePath = null;
        if ($request->hasFile('resume')) {
            $filePath = $request->file('resume')->store($user->id . '/resumeFiles', 'public');
        }
        Application::create([
            "user_id" => $user->id,
            "listing_id" => $request->listingId,
            "note" => $request->note,
            "status" => "pending",
            "resume" => $filePath
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    /**
     * Problem Analysis:
     * The company is showing as null in the application data because the 'company_id' field in the 'listings' table is null.
     * This means that either the listing was created without associating a company, or the relationship between Listing and Company is not properly set up or populated.
     * 
     * Solution:
     * 1. Ensure that the 'company_id' field in the 'listings' table is correctly set for each listing.
     * 2. Make sure the Listing model has a proper relationship defined to the Company model, e.g.:
     *      public function company() {
     *          return $this->belongsTo(Company::class);
     *      }
     * 3. When creating a listing, always associate it with a valid company.
     * 4. If you want to fetch the company name, make sure the company exists and is related to the listing.
     * 
     * Controller code (no change needed if relationships and data are correct):
     */
    public function allApplications(Request $request, $id)
    {
        // Get the current user's company
        $company = Company::where('user_id', auth()->id())->first();

        // If the user doesn't have a company, show nothing or handle as needed
        if (!$company) {
            $applications = collect(); // empty collection
        } else {
            // Only get applications for listings that belong to this company
            $applications = Application::whereHas('listing', function ($query) use ($company) {
                $query->where('company_id', $company->id);
            })->get();
        }

        return view('pages.allApplications', compact('applications'));
        //     $user = $request->user();
        //     $listing = Listing::find($id);
        //     $
        //     // This will eager load the listing and its company, as well as the user.
        //     $applications = Application::with(['listing.company', 'user'])
        //         ->orderBy('created_at', 'desc')
        //         ->get();
        //     // return $applications;
        //     // Return the view with the applications data.
        //     return view('pages.allApplications', compact('applications', 'listing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }

    public function myApplications(Request $request)
    {
        $user = $request->user();
        $applications = Application::where('user_id', $user->id)->get();
        //listing
        return view('pages.myApplications', compact('applications'));
    }

    public function updateStatus(Request $request, $id)
    {
        $application = Application::find($id);
        $application->status = $request->status;
        $application->save();
        return back();
    }
    public function approveStatus(Request $request, $id)
    {
        $application = Application::find($id);
        if ($application) {
            $application->status = 'Accepted'; // Change status to 'Approved'
            $application->save();
            return back()->with('success', 'Application Accepted successfully!');
        }
        return back()->with('error', 'Application not found.');
    }
    public function rejectStatus(Request $request, $id)
    {
        $application = Application::find($id);
        if ($application) {
            $application->status = 'Rejected';
            $application->save();
            return back()->with('success', 'Application is rejected');
        }
        return back()->with('error', 'Application not found');
    }

//     use Illuminate\Support\Facades\Storage;
// use Symfony\Component\HttpFoundation\Response;

public function viewResume($applicationId)
{
    $application = \App\Models\Application::findOrFail($applicationId);

    if (!$application->resume || !Storage::disk('public')->exists($application->resume)) {
        abort(404, 'Resume not found.');
    }

    $file = Storage::disk('public')->get($application->resume);
    $mimeType = Storage::disk('public')->mimeType($application->resume);

    return response($file, 200)
        ->header('Content-Type', $mimeType)
        ->header('Content-Disposition', 'inline; filename="' . basename($application->resume) . '"');
}
}
