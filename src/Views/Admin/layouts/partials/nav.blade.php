<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
        <div class="logo d-flex justify-content-between">
            <a href="{{ url('admin/')}}"><img src="{{ asset('assets/admin/img/logo.png')}}" alt></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <!-- Dash board -->
            <li class="mm-active">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset('assets/admin/img/menu-icon/dashboard.svg')}}" alt>
                    </div>
                    <span>Dashboard</span>
                </a>
                <ul>
                    <li><a class="active" href="{{url('admin/users')}}">User</a></li>
                    <li><a href="{{url('admin/categories')}}">Categories</a></li>
                    <li><a href="">Dark Menu</a></li>
                </ul>
            </li>

            

            <li class>
                <a href="{{ url('admin/posts')}}" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset('assets/admin/img/menu-icon/5.svg')}}" alt>
                    </div>
                    <span>Posts</span>
                </a>
            </li>

            
        </ul>
    </nav>