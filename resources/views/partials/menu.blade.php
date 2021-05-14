<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    Dashboard
                </a>
            </li>
            {{--<li class="nav-item">
                <a href="{{ route("employees.index") }}" class="nav-link {{ request()->is('employees') || request()->is('employees/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-cogs nav-icon">

                    </i>
                    Employee
                </a>
            </li>--}}
            <li class="nav-item">
                <a href="{{ route("salaries.index") }}" class="nav-link {{ request()->is('salaries') || request()->is('salaries/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-cogs nav-icon">

                    </i>
                    Employee Salary
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("monthly.summary.salaries") }}" class="nav-link {{ request()->is('salary') || request()->is('salary/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-cogs nav-icon">

                    </i>
                    Monthly Summary(All Employee)
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    Logout
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
