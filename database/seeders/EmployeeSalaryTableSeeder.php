<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeSalary;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EmployeeSalaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $yearRange = range(2018, 2020);
        $monthRange = range(1, 12);
        $salaries = [10000, 20000, 30000, 40000, 50000, 60000, 70000, 80000, 90000];
        $employeeSalaries = [];
        $i = 0;
        foreach(Employee::all() as $employee) {
            $salaryIncrement = $salaryAmount = 0;
            $i = isset($salaries[$i]) ? $i : 0;
            $salaryAmount = $salaries[$i];
            foreach($yearRange as $year) {
                $salaryAmount += $salaryIncrement;
                foreach ($monthRange as $month) {
                    // dump($salaryAmount .'-'. $year.'-'. $month.'===>'.$employee->id);
                    $monthYear = Carbon::create($year, $month, '01');
                    $employeeSalaries[] = [
                        'employee_id' => $employee->id,
                        'amount' => $salaryAmount,
                        'month_year' => date('Y-m-d', strtotime($monthYear->toDateTimeString())),
                    ];
                }
                $salaryIncrement = 5000;
            }
            $i++;
        }
        //dd($employeeSalaries);
        EmployeeSalary::insert($employeeSalaries);
    }
}
