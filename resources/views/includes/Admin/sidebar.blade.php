<div class="topnav">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                          @if(Auth::user()->hasRole('user'))
                            <ul class="navbar-nav">

                                <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                                            <i class="bx bx-file mr-1"></i><span key="t-extra-pages">Notification</span>
                                        </a>
                                </li>
                                <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="{{URL::to('/student/notes')}}" id="topnav-more" role="button">
                                            <i class="bx bx-file mr-1"></i><span key="t-extra-pages">My Notes</span>
                                        </a>
                                </li>
                                <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="{{URL::to('/student/myquestion')}}" id="topnav-more" role="button">
                                            <i class="bx bx-file mr-1"></i><span key="t-extra-pages">My Question</span>
                                        </a>
                                </li>
                                <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="{{URL::to('/student/mycourse')}}" id="topnav-more" role="button">
                                            <i class="bx bx-file mr-1"></i><span key="t-extra-pages">My Course</span>
                                        </a>
                                </li>   
                            </ul>
                            @endif
                        </div>
                    </nav>
                </div>
 </div>
