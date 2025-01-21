<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="dropdown notification-list d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                </form>
            </div>
        </li>


      

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    <img alt="image" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('backend/assets/images/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                </span>
                <span class="account-user-info">
                    <span class="account-user-name">{{ Auth::user()->name }}</span>
                </span>
            </a>
            
            <style>
                .nav-user .account-user-avatar {
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px; /* Sesuaikan spasi antara foto dan nama */
}

.nav-user .account-user-info {
    display: inline-block;
    vertical-align: middle;
    line-height: 1.2; /* Sesuaikan untuk menurunkan nama agar sejajar dengan avatar */
}

.nav-user .account-user-name {
    font-weight: bold;
    margin-top: 10px; /* Sesuaikan margin untuk menurunkan sedikit nama */
}


            </style>
            
            
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
              

                <!-- item-->
                <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 <i class="mdi mdi-logout me-1"></i>
                 <span>Logout</span>
             </a>
             
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
</div>