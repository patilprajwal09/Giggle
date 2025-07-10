<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Models\Company;


class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $search = $request->input('search');
        
        $listings = Listing::query();
        if ($search) {
            $listings = $listings->where(function($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                      ->orWhere('company', 'like', "%$search%")
                     ;
            });
        }
        $listings = $listings->get();
        return view('index')->with('jobRecords', $listings);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = $request->user();
        $company = Company::where('user_id', $user->id)->first();
        if (!$company) {
            return redirect()->route('addCompany');
        }
        return view('pages.addJob')->with('company', $company);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $company = Company::where('user_id', $user->id)->first();
        if(!$company){
            return redirect()->route('addCompany');
        }
        $inputs = $request->input();

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        $listings = Listing::create([
            "title" => $request->input('title'),
            "salary" => $request->input('salary'),
            "vacancies" => $request->input('vacancies'),
            "experience" => $request->input('experience'),
            "description" => $request->input('description'),
            "company_id" => $company->id,
        ]);
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $listing = Listing::find($id);

        if (!$listing) {
            return redirect()->route('index')->with('error', 'Job not found');
        }

        // Fetch the related company using the company_id foreign key
        $company = null;
        if ($listing->company_id) {
            $company = \App\Models\Company::find($listing->company_id);
        }

        // Attach the company name and logo to the listing object for the view
        $listing->company = $company ? $company->name : null;
        $listing->logo = $company ? $company->logo : null;
        $listing->email = $company ? $company->email : null;
        $listing->website = $company ? ($company->website ?? null) : null; // in case you want to show website

        return view('pages.showJob')->with('jobRecords', $listing);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing,$id)

    {
         $listings = Listing::find($id);
        return view('pages.editJob')->with('jobRecords', $listings);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $listings = Listing::find($id);
        
        if (!$listings) {
            return redirect()->to('/index')->with('error', 'Job listing not found');
        }

        // Handle logo upload if a new file is provided
        $logoPath = $listings->logo; // Keep existing logo by default
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Update the listing
        $listings->update([
            "title" => $request->input('title'),
            "logo" => $logoPath,
            "company" => $request->input('company'),
            "location" => $request->input('location'),
            "email" => $request->input('email'),
            "website" => $request->input('website'),
            "description" => $request->input('description'),
        ]);

        return redirect()->to('index')->with('success', 'Job listing updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Listing $listing,$id)

    {
        $listings = Listing::find($id);
        $listings->delete();
        return redirect()->to('/index');
    }

     public function manage(Listing $listing)
    {
        //  $listings = Listing::find($id);
        //   return view('pages.manageJob')->with('jobRecords', $listings);
          $listings = Listing::all();
        return view('pages.manageJob')->with('jobRecords',$listings);
    }
}

