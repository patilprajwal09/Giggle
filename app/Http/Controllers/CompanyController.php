<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
    public function create(Request $request)
    {
        $user=$request->user();
        $companies=Company::where('user_id',$user->id)->first();
        if($companies){
            return redirect()->route('addJob');
        }

        return view('pages.addCompany')->with('company', $companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $user=$request->user();
    $company=Company::where('user_id',$user->id)->first();
    if($company){
        return redirect()->route('addJob');
    }

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        $companies = Company::create([
            "logo" => $logoPath,
            "user_id" => $user->id,
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "phone" => $request->input('phone'),
            "address" => $request->input('address'),
            "city" => $request->input('city'),
            "state" => $request->input('state'),
        ]);
        return back()->with('success', 'Company created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $companies = Company::find($id);
        return view('pages.compProfile')->with('companyRecords',$companies);
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $companies = Company::find($id);
        return view('pages.editCompany')->with('company', $companies);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $companies = Company::find($id);
        $companies->update($request->all());
        return redirect()->route('compProfile', $companies->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
