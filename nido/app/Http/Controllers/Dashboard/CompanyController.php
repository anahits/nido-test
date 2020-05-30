<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();//latest()->paginate(5);//

        // load the view and pass the nerds
        return view('admin.companies.index', compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.companies.create');
    }

  

    /**

     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'email' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg', 
            'website' => 'required', 
        ]);
       
       if($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = $image->getClientOriginalName();
            $image->storeAs('public/logos/', $filename);
            $request->logo = $filename;
        }
        
        $company = new Company();
        $company->name       = $request->input('name');
        $company->email          = $request->input('email');
        $company->logo       = $filename;
        $company->website        = $request->input('website');
        $company->save();
   
        return redirect()->route('companies.index', ['locale' => app()->getLocale()])
                        ->with('success','Company created successfully.');
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $Company
     * @return \Illuminate\Http\Response
     */
    public function show($lang, Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $Company
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $Company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, Company $company)
    {
        $company->update($request->all());
        $company->name = $request->name;
        $company->email = $request->email; 
        if($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = $image->getClientOriginalName();
            $image->storeAs('public/logos/', $filename);
            $company->logo = $filename;
        }       
        $company->website = $request->website;
        $company->save();
   
        return redirect()->route('companies.index', ['locale' => app()->getLocale()])
                        ->with('success','Company updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $Company
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index', ['locale' => app()->getLocale()])

                        ->with('success','Company deleted successfully.');

    }
}
