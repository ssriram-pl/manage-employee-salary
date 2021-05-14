<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Repositories\EmployeeSalaryRepository;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    private $employeeSalaryRepo;

    public function __construct()
    {
        $this->employeeSalaryRepo = new EmployeeSalaryRepository();
    }

    public function index()
    {
        $employees = $this->employeeSalaryRepo->getAllEmployees();
        return view('salaries.index', compact('employees'));
    }

    public function getEmployeeSalaryData(Request $request)
    {
        $filterType = ($request->input('filter_type')) ? $request->input('filter_type') : 'month-wise';
        $employeeId = $request->route()->parameter('employee_id');
        $employee = Employee::find($employeeId);

        $salaries = $this->employeeSalaryRepo->getEmployeeSalary($filterType, $employeeId);
        $view = ($filterType == 'month-wise') ? 'salaries.monthwise' : 'salaries.yearwise';
        return view($view, compact('employee', 'salaries', 'filterType'));
    }

    public function getMonthlySummarySalary()
    {
        $salaries = $this->employeeSalaryRepo->getEmployeeSalary($filterType='monthly-summary', false);
        return view('salaries.summarywise', compact('salaries'));
    }
}
