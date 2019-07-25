<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeesController extends Controller
{
    public function show()
    {
        $employees = Employee::join('companies','employees.company_id','=','companies.id')
        ->select('employees.*','companies.name as company_name')->get();

        $companies =  Company::all();

        return view('business.employees',compact('employees','companies'));
    }

    public function create(Request $request)
    {
        $requestData = $request->all();

        $employee = new Employee();
        $employee->name = $requestData['name'];
        $employee->company_id = $requestData['company_id'];

        $employee->save();

        return back();
    }

    public function delete(Employee $employee)
    {
        $employee->delete();

        return back();
    }

    public function edit(Employee $employee)
    {
        return back()->with('id',$employee->id);
    }

    public function update(Request $req, Employee $employee)
    {
        $employee->name = $req->name;
        $employee->company_id = $req->company_id;
        $employee->save();

        return back();
    }
}
