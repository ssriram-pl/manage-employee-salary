@extends('layouts.auth')
@section('content')
    <div class="card">
        <div class="card-header">
            <strong> Monthly Summary Data For all Employees </strong>
        </div>
        @php
            $short_month_name = [
                12=>'Dec', 11=>'Nov', 10 => 'Oct', 9=>'Sep',
                8=>'Aug', 7=>'Jul', 6 => 'Jun', 5=>'May',
                4=>'Apr', 3=>'Mar', 2 => 'Feb', 1=>'Jan',
            ];
        @endphp

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
                            {{ $short_month_name[$row->month_wise] }} {{ $row->year_wise }}
                        </td>
                        <td>
                            {{ number_format($row->salary_amount, 2) }}
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

