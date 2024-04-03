<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SpaceEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EmployeeController extends Controller
{
    public function index()
    {
        $employeeData = Employee::orderBy('emp_id', 'ASC')->paginate(50);
        return view('pages.employee.employee_list', ['employees' => $employeeData]);
    }


    // //employee table structure

    public function fetchAll()
    {
        $employees = Employee::all();
        $output = '';
        if ($employees->isNotEmpty() > 0) {
            $output .= '<table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';

            foreach ($employees as $key => $emp) {
                $output .= '<tr>
                <td>' . ++$key . '</td>
                <td>' . $emp->emp_id . '</td>
                <td>' . $emp->emp_name . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="btn btn-primary btn-sm mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModel"><i class="bx bx-edit" style="font-size: 20px"></i></a>
                  <a href="#" id="' . $emp->id . '" class="btn btn-danger btn-sm mx-1 deleteIcon"><i class="bx bxs-trash" style="font-size: 20px"></i></a>
                </td>
              </tr>';
            }

            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h4 class="text-center text-secondary my-5">No record in the database!</h4>';
        }
    }

    public function store(Request $request)
    {

        $value = $request->emp_id;

        //check if the value already exists in the database
        $existingData = Employee::where('emp_id', $value)->first();

        if ($existingData) {
            return response()->json(['success' => false, 'message' => $value . ' already exists in the database', 'title' => 'Found Duplicate', 'type' => 'info']);
        }

        $data = ['emp_id' => $request->emp_id, 'emp_name' => $request->emp_name,];
        Employee::create($data);
        return response()->json(['success' => true, 'message' => 'Employee added successfully', 'title' => 'Saved!', 'type' => 'success']);
    }

    /*
     * To display employee details on edit modal.
     */
    public function edit(Request $request)
    {
        $emp_id = $request->id;
        $employee = Employee::find($emp_id);
        return response()->json($employee);
    }
    /*
     * Update existing employee
     */
    public function update(Request $request)
    {
        $id = $request->emp_id;
        $emp_id = $request->edit_employee_id;
        $emp_name = $request->edit_employee_name;

        //check if the value already exists in the database
        $existingData = Employee::where('emp_id', $emp_id)->where('emp_name', $emp_name)->first();
        if ($existingData) {
            return response()->json(['success' => false, 'message' => 'This employee already exists in the database', 'title' => 'Found Duplicate', 'type' => 'info']);
        }

        $update_data = ['emp_id' => $emp_id, 'emp_name' => $emp_name];
        Employee::find($id)->update($update_data);
        return response()->json(['success' => true, 'message' => 'Employee updated successfully', 'title' => 'Updated!', 'type' => 'success']);
    }
    /*
     * delete selected employee from the database
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        Employee::destroy($id);
    }
}
