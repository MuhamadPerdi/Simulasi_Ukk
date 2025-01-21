<div class="leftside-menu">
    
    <!-- LOGO -->
   

    <!-- LOGO -->
    {{-- <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="backend/assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="backend/assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a> --}}

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="{{route('dashboard')}}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Apps</li>

            <li class="side-nav-item">
                <a href="{{url('/inventaris')}}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Inventaris </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{url('/peminjaman')}}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Peminjaman</span>
                </a>
            </li>

            {{-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCrm" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
                    <i class="uil uil-tachometer-fast"></i>
                    <span class="badge bg-danger text-white float-end">New</span>
                    <span> Master Data </span>
                </a>
                <div class="collapse" id="sidebarCrm">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('departemen.index')}}">Departemen Ticket</a>
                        </li>
                        <li>
                            <a href="{{route('prioritas.index')}}">Prioritas Ticket</a>
                        </li>
                        <li>
                            <a href="{{route('type.index')}}">Type Ticket</a>
                        </li>
                        <li>
                            <a href="{{route('status.index')}}">Status Ticket</a>
                        </li>
                        <li>
                            <a href="{{route('category.index')}}">Category Ticket</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
                      
                    </ul>
            </li>
        </ul>

        <!-- Help Box -->
       
        <!-- end Help Box -->
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>