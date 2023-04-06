<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right"></span>
                        <span>Dashboards</span>
                    </a>
                <li>
                    <a href="{{ route('applicants.index') }}" class="waves-effect">
                        <i class="fa fa-users"></i>
                        <span>Applicant</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect">
                        <i class="bx bx-git-branch"></i>
                        <span>Look Up</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('division.index') }}">Divisions</a></li>
                        <li><a href="{{ route('district.index') }}">Districts</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
