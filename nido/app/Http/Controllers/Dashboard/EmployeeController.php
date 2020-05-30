<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
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
        $employees = Employee::all();//latest()->paginate(5);//
        $companies = Company::pluck('name', 'id_company');

        // load the view and pass the nerds
        return view('admin.employees.index', compact(['employees','companies']))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $companies = Company::pluck('name', 'id_company');
         return view('admin.employees.create', compact('companies'));
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
            'first_name' => 'required', 
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required', 
            'company_id' => 'required', 
        ]);
        
        $employee = new Employee();
        $employee->first_name       = $request->input('first_name');
        $employee->last_name          = $request->input('last_name');
        $employee->email          = $request->input('email');
        $employee->phone       = $request->input('phone');
        $employee->company_id        = $request->input('company_id');

        $employee->save();
   
        return redirect()->route('employees.index', ['locale' => app()->getLocale()])
                        ->with('success','Employee created successfully.');
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($lang, Employee $employee)
    {
        $companies = Company::pluck('name', 'id_company');
        return view('admin.employees.show', compact(['employee', 'companies']));
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, Employee $employee)
    {
        $companies = Company::pluck('name', 'id_company');
        return view('admin.employees.edit', compact(['employee', 'companies']));
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, Employee $employee)
    {

        $employee->update($request->all());
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;     
        $employee->phone = $request->phone;
        $employee->company_id = $request->company_id;
        $employee->save();
   
        return redirect()->route('employees.index', ['locale' => app()->getLocale()])
                        ->with('success','Employee updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index', ['locale' => app()->getLocale()])

                        ->with('success','Employee deleted successfully.');

    }
}
