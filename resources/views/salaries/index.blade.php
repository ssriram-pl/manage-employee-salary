@extends('layouts.auth')
@section('content')

    <div class="card">
        <div class="card-header">
            <strong>Employee List</strong>
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ">
                <thead>
                    <tr>
                        <th width="10">S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Salary Filter</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($employees as $key=>$employee)
                    <tr>
                        <td width="10">
                            {{ $key + 1 }}
                        </td>
                        <td>
                            {{ $employee->name }}
                        </td>
                        <td>
                            {{ $employee->email }}
                        </td>
                        <td>
                            {{ $employee->phone }}
                        </td>
                        <td>
                            <form name="" action="{{ route('salary.employee', ['employee_id' => $employee->id]) }}" method="get">
{{--                                @csrf--}}
                                <select name="filter_type" class="salary_filter form-control">
                                    <option name="">Select</option>
                                    <option value="month-wise">Month Wise</option>
                                    <option value="year-wise">Year Wise</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            $('.salary_filter').on('change', function() {
                $(this).closest('form').submit();
            });
        });
    </script>

@endsection

