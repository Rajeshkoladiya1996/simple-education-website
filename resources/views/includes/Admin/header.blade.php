<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                @if(Auth::user()->hasRole('user'))
                <a href="{{URL::to('/studentdash')}}" class="logo logo-dark">
                    <span class="logo-sm">
                    <p style="color:white"> ONLINE TUTORING </p>
                    </span>
                    <span class="logo-lg">
                    <p style="color:white"> ONLINE TUTORING </p>
                    </span>
                </a>

                <a href="{{URL::to('/studentdash')}}" class="logo logo-light">
                    <span class="logo-sm">
                    <p style="color:white"> ONLINE TUTORING </p>
                    </span>
                    <span class="logo-lg">
                    <p style="color:white"> ONLINE TUTORING </p>
                    </span>
                </a>
                @else
                <a href="{{URL::to('/')}}" class="logo logo-dark">
                    <span class="logo-sm">
                    <p style="color:white"> ONLINE TUTORING </p>
                    </span>
                    <span class="logo-lg">
                    <p style="color:white"> ONLINE TUTORING </p>
                    </span>
                </a>

                <a href="{{URL::to('/')}}" class="logo logo-light">
                    <span class="logo-sm">
                    <p style="color:white"> ONLINE TUTORING </p>
                    </span>
                    <span class="logo-lg">
                   <p style="color:white"> ONLINE TUTORING </p>
                    </span>
                </a>

                @endif
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>

        </div>

        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              
                <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->name}}</span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="{{URL::to('/logout')}}"><i
                        class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
            </div>
        </div>
    </div>
</header>