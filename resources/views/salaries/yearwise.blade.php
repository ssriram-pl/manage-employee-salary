@extends('layouts.auth')
@section('content')
    <div class="card">
        <div class="card-header">
           <strong> {{ 'Year Wise Data - '. $employee->name }}</strong>
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Year</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($salaries as $key=>$row)
                    <tr>
                        <td width="10">
                            {{ $key + 1 }}
                        </td>
                        <td>
                            {{ $row->year_wise }}
                        </td>
                        <td>
                            {{ number_format($row->salary_amount, 2) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>
@endsection

