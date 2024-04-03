<?php

namespace App\Http\Controllers;

use App\Models\AssignedEmployee;
use App\Models\Employee;
use App\Models\AnnualEvent;
use App\Models\EventType;
use App\Models\NewEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AssignedEmployeeController extends Controller
{
    public function index() {
        // $assign_emp = AssignedEmployee::orderBy('assigned_em_id','ASC')->paginate(50);
        // return view('pages.assigned_employee.assigned_employee_list',['assigned_employee' => $assign_emp]);

        $employee = Employee::select('*')->get();
        $event = NewEvent::select('*')->get();
        return view('pages.assigned_employee.assigned_employee_list',[
            'employee' => $employee,
            'event' => $event
        ]);

    }
}
