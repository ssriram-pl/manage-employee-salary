<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Models\EmployeeSalary;
use Illuminate\Support\Facades\DB;

class EmployeeSalaryRepository
{
    const FILTER_MONTH_WISE = 'month-wise';
    const FILTER_YEAR_WISE = 'year-wise';
    const FILTER_MONTHLY_SUMMARY = 'monthly-summary';

    public function getAllEmployees()
    {
        return Employee::all();
    }

    public function getEmployeeSalary($filterType, $employeeId)
    {
        $model = new EmployeeSalary();
        if($filterType == self::FILTER_YEAR_WISE) {
            $model = $model::select([DB::raw('YEAR(month_year) as year_wise'), DB::raw('SUM(amount) as salary_amount')]);
        }
        if($filterType == self::FILTER_MONTHLY_SUMMARY) {
            $model = $model::select([DB::raw('YEAR(month_year) as year_wise'), DB::raw('MONTH(month_year) as month_wise'), DB::raw('SUM(amount) as salary_amount')]);
        }

        $model = $model->when($filterType == self::FILTER_MONTH_WISE, function ($q) use ($employeeId){
            return $q->where('employee_id', $employeeId)
                ->orderBy('month_year', 'DESC');
        });
        $model = $model->when($filterType == self::FILTER_YEAR_WISE, function ($q) use ($employeeId) {
            return $q->where('employee_id', $employeeId)
                ->groupBy(DB::raw('YEAR(month_year)'))
                ->orderBy(DB::raw('YEAR(month_year)'), 'DESC');
        });
        $model = $model->when($filterType == self::FILTER_MONTHLY_SUMMARY, function ($q) {
            return $q->groupBy([DB::raw('MONTH(month_year)'), DB::raw('YEAR(month_year)')])
                ->orderBy(DB::raw('YEAR(month_year)'), "DESC")
                ->orderBy(DB::raw('MONTH(month_year)'), "DESC");
        });

        return $model->paginate(10);
    }
}
