<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeSalary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employeeSalaries = EmployeeSalary::select([DB::raw('YEAR(month_year) as year_wise'), DB::raw('SUM(amount) as salary_amount')])
                ->groupBy(DB::raw('YEAR(month_year)'))
                ->orderBy(DB::raw('YEAR(month_year)'), "DESC")->get(10);

        $employee = Employee::all();

        return view('home', compact('employeeSalaries', 'employee'));
    }
}
