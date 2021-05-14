@extends('layouts.auth')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2> Heptagon - Employee Salary Dashboard</h2>
            </div>
        </div>
    </div>
    <section class="h-100">
        <header class="container h-100">
            <div class="d-flex align-items-center justify-content-center h-100">
                <div class="d-flex flex-column">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Total Employees</div>
                        <div class="card-body align-self-center">
                            <h5 class="card-title">{{ $employee->count() }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </section>

    <div class="col-lg-12 text-center">
        <h2> Employee Year Wise Summary Salaries </h2>
    </div>

    <div class="row justify-content-center align-items-center">
        @php
           $bgColor = ['bg-success', 'bg-warning', 'bg-danger'];
        @endphp
        @foreach($employeeSalaries as $key=>$row)
            <div class="d-flex align-items-center justify-content-center h-100 m-1">
                <div class="d-flex flex-column">
                    <div class="card text-white {{ $bgColor[$key] }} mb-3" style="max-width: 18rem;">
                        <div class="card-header text-center">{{ $row->year_wise }}</div>
                        <div class="card-body align-self-center">
                            <h5 class="card-title">{{ number_format($row->salary_amount, 2) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
@section('scripts')
    @parent

@endsection
