@extends('layouts.auth')
@section('content')
    <div class="card">
        <div class="card-header">
            <strong> {{ 'Month Wise Data - '. $employee->name }}</strong>
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Month / Year</th>
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
                            {{ date('M Y', strtotime($row->month_year)) }}
                        </td>
                        <td>
                            {{ number_format($row->amount, 2) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row float-md-right mr-1">
                {{$salaries->links("pagination::bootstrap-4")}}
            </div>
        </div>

    </div>
@endsection

