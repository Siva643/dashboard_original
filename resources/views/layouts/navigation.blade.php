<!-- Sidebar -->
<div class="sidebar ">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i style="margin-left:5px;" class="fa fa-video"></i>
                    <p style="margin-left:10px;">
                        {{ __('Live videos') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Statistiques') }}" class="nav-link">
                    <i style="margin-left:5px;" class="fa fa-chart-line"></i>
                   
                    <p style="margin-left:10px;">
                        
                            {{ __('Statistiques ') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="dropdown-item nav-link" style="color:rgb(178, 178, 178);"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        <i style="margin-left:7px;" class="mr-2 fas fa-sign-out-alt"></i>
                       
                        {{ __('Log Out') }}
                        
                    </a>
                </form>
            </li>

            <!--<li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        Two-level menu
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Child menu</p>
                        </a>
                    </li>
                </ul>
            </li>-->
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->