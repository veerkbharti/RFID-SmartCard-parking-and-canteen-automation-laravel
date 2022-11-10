<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{

    public function employees()
    {
        $employees = User::all()->where('role', 'employee');
        return view('admin.employees', compact('employees'));
    }

    public function addEmployee()
    {
        return view('admin.add-employee');
    }

    public function createEmployee(Request $request)
    {

        $employee = new User;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->mobile = $request->mobile;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->address = $request->address;
        $employee->city = $request->city;
        $employee->company = $request->company;
        $employee->job_title = $request->job_title;
        $employee->role = "employee";
        $employee->rfid = rand(10000, 99999);
        $employee->password = Hash::make($request->password);
        $employee->email_verified_at = now();
        $employee->remember_token = Str::random(10);
        $employee->save();

        if ($employee) {
            session()->flash('employee-add-success', 'Employee created successfully');
            return redirect()->route('employee.add');
        } else {
            session()->flash('employee-add-error', 'Something went wrong');
            return redirect()->route('employee.add');
        }
    }

    public function editEmployee($id)
    {
        $employee = User::find($id);
        return view('admin.edit-employee', compact('employee'));
    }

    public function updateEmployee(Request $request, $id)
    {

        $employee = User::find($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->mobile = $request->mobile;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->address = $request->address;
        $employee->city = $request->city;
        $employee->company = $request->company;
        $employee->job_title = $request->job_title;
        $employee->save();

        if ($employee) {
            session()->flash('employee-update-success', 'Employee updated successfully');
            return redirect()->route('employee.edit',['id' => $employee->id]);
        } else {
            session()->flash('employee-update-error', 'Something went wrong');
            return redirect()->route('employee.edit', ['id' => $employee->id]);
        }
    }

    public function deleteEmployee($id)
    {
        $employee = User::find($id);
        if (!is_null($employee)) $employee->delete();

        session()->flash('employee-delete-success', 'Employee deleted successfully');
        return redirect('/superadmin/employees');
    }
}
