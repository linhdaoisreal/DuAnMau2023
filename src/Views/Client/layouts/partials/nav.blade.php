<!-- navigation -->
<header class="navigation fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white">
                <a class="navbar-brand order-1" href="{{url('')}}">
                    <img class="img-fluid" width="100px" src="{{url('assets/client/images/logo.png')}}"
                        alt="Reader | Hugo Personal Blog Template">
                </a>
                <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
                    <ul class="navbar-nav mx-auto">
                        <!-- Homepage -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{asset('assets/client/#')}}" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                homepage <i class="ti-angle-down ml-1"></i>
                            </a>

                            <!-- Dropdown menu -->
                            <div class="dropdown-menu">
                                
                                @php
                                    foreach($categories as $category){
                                        echo'
                                        <a class="dropdown-item" href='.url('post-by-category/'.$category['id'].'').'>
                                            '.$category['name'].'
                                        </a>
                                        ';
                                    }
                                @endphp

                            </div>
                        </li>

                        <!-- About -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{asset('assets/client/#')}}" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                About <i class="ti-angle-down ml-1"></i>
                            </a>
                            <div class="dropdown-menu">

                                <a class="dropdown-item" href="{{asset('assets/client/about-me.html')}}">About Me</a>

                                <a class="dropdown-item" href="{{asset('assets/client/about-us.html')}}">About Us</a>

                            </div>
                        </li>
                        
                        <!-- Contact -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('assets/client/contact.html')}}">Contact</a>
                        </li>

                        <!-- User -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('users/post')}}">Account</a>
                        </li>
                        
                        <!-- Writing -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('writing')}}">Writing</a>
                        </li>
                    </ul>
                </div>

                <div class="order-2 order-lg-3 d-flex align-items-center">

                <nav>
                    @if (!isset($_SESSION['user']))
                        <a class="m-2 p-2 btn btn-primary" href="{{ url('login') }}">Login</a>
                    @endif

                    @if (isset($_SESSION['user']))
                        <a class="m-2 p-2 btn btn-primary" href="{{ url('logout') }}">Logout</a>
                    @endif
                </nav>

                    <!-- search -->
                    <form action="{{url('post/search')}}" class="search-bar" method="post">
                        <input id="search-query" name="search" type="search" placeholder="Type &amp; Hit Enter...">
                    </form>

                    <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse"
                        data-target="#navigation">
                        <i class="ti-menu"></i>
                    </button>
                </div>

            </nav>
        </div>
    </header>
    <!-- /navigation -->