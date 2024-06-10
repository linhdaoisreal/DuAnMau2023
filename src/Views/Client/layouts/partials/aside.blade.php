<!-- Aside -->
<aside class="col-lg-4 sidebar-home">
    <!-- Search -->
    <div class="widget">
        <h4 class="widget-title"><span>Search</span></h4>
        <form action="{{url('post/search')}}" class="widget-search" method="post">
            <input class="mb-3" id="search-query" name="search" type="search" placeholder="Type &amp; Hit Enter...">
            <i class="ti-search"></i>
            <button type="submit" class="btn btn-primary btn-block">Search</button>
        </form>
    </div>

    <!-- about me -->
    <div class="widget widget-about">
        <h4 class="widget-title">Hi, I am Alex!</h4>
        <img class="img-fluid" src="{{asset('assets/client/images/author.jpg')}}" alt="Themefisher">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel in in donec iaculis tempus odio
            nunc laoreet . Libero ullamcorper.</p>
        <ul class="list-inline social-icons mb-3">

            <li class="list-inline-item"><a href="{{asset('assets/client/#')}}"><i class="ti-facebook"></i></a></li>

            <li class="list-inline-item"><a href="{{asset('assets/client/#')}}"><i class="ti-twitter-alt"></i></a></li>

            <li class="list-inline-item"><a href="{{asset('assets/client/#')}}"><i class="ti-linkedin"></i></a></li>

            <li class="list-inline-item"><a href="{{asset('assets/client/#')}}"><i class="ti-github"></i></a></li>

            <li class="list-inline-item"><a href="{{asset('assets/client/#')}}"><i class="ti-youtube"></i></a></li>

        </ul>
        <a href="{{asset('assets/client/about-me.html')}}" class="btn btn-primary mb-2">About me</a>
    </div>

    <!-- authors -->
    <!-- <div class="widget widget-author">
        <h4 class="widget-title">Authors</h4>
        <div class="media align-items-center">
            <div class="mr-3">
                <img class="widget-author-image" src="{{asset('assets/client/images/john-doe.jpg')}}">
            </div>
            <div class="media-body">
                <h5 class="mb-1"><a class="post-title" href="{{asset('assets/client/author-single.html')}}">Charls
                        Xaviar</a></h5>
                <span>Author &amp; developer of Bexer, Biztrox theme</span>
            </div>
        </div>
        <div class="media align-items-center">
            <div class="mr-3">
                <img class="widget-author-image" src="{{asset('assets/client/images/kate-stone.jpg')}}">
            </div>
            <div class="media-body">
                <h5 class="mb-1"><a class="post-title" href="{{asset('assets/client/author-single.html')}}">Kate
                        Stone</a></h5>
                <span>Author &amp; developer of Bexer, Biztrox theme</span>
            </div>
        </div>
        <div class="media align-items-center">
            <div class="mr-3">
                <img class="widget-author-image" src="{{asset('assets/client/images/john-doe.jpg')}}" alt="John Doe">
            </div>
            <div class="media-body">
                <h5 class="mb-1"><a class="post-title" href="{{asset('assets/client/author-single.html')}}">John Doe</a>
                </h5>
                <span>Author &amp; developer of Bexer, Biztrox theme</span>
            </div>
        </div>
    </div> -->

    <!-- Search -->
    <div class="widget">
        <h4 class="widget-title"><span>Never Miss A News</span></h4>
        <form action="#!" method="post" name="mc-embedded-subscribe-form" target="_blank" class="widget-search">
            <input class="mb-3" id="search-query" name="s" type="search" placeholder="Your Email Address">
            <i class="ti-email"></i>
            <button type="submit" class="btn btn-primary btn-block" name="subscribe">Subscribe
                now</button>
            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                <input type="text" name="b_463ee871f45d2d93748e77cad_a0a2c6d074" tabindex="-1">
            </div>
        </form>
    </div>

    <!-- categories -->
    <div class="widget widget-categories">
        <h4 class="widget-title"><span>Categories</span></h4>
        <ul class="list-unstyled widget-list">

            @foreach ($analysCate as $anaCate)
            <li>
                <a href="{{url('post-by-category/'.$anaCate['id'].'')}}" class="d-flex">
                    {{$anaCate['name']}}
                    <small class="ml-auto">{{$anaCate['analys_post']}}</small>
                </a>
            </li>
            @endforeach
            
        </ul>
    </div><!-- tags -->
    <div class="widget">
        <h4 class="widget-title"><span>Tags</span></h4>
        <ul class="list-inline widget-list-inline widget-card">
            @foreach ($categories as $category)
                <li class="list-inline-item">
                    <a href="{{url('post-by-category/'.$category['id'].'')}}">{{$category['name']}}</a>
                </li>
            @endforeach
        </ul>
    </div>
    
    <!-- recent post -->
    <!-- <div class="widget">
        <h4 class="widget-title">Recent Post</h4>

        @foreach ($recentPost as $rcPost)
            
            <article class="widget-card">
                <div class="d-flex">
                    @if ($rcPost['image'] != "")
                        <img class="card-img-sm" src="{{url($rcPost['image'])}}">
                    @else
                    
                    @endif
                    
                    <div class="ml-3">
                        <h5><a class="post-title" href="{{url('post/'.$rcPost['id'].'')}}">
                            {{$rcPost['tittle']}}
                        </a></h5>
                        <ul class="card-meta list-inline mb-0">
                            <li class="list-inline-item mb-0">
                                <i class="ti-calendar"></i>{{$rcPost['created_at']}}
                            </li>
                        </ul>
                    </div>
                </div>
            </article>
        @endforeach
        
    </div> -->

    <!-- Social -->
    <div class="widget">
        <h4 class="widget-title"><span>Social Links</span></h4>
        <ul class="list-inline widget-social">
            <li class="list-inline-item"><a href="{{url('')}}"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item"><a href="{{url('')}}"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item"><a href="{{url('')}}"><i class="ti-linkedin"></i></a></li>
            <li class="list-inline-item"><a href="{{url('')}}"><i class="ti-github"></i></a></li>
            <li class="list-inline-item"><a href="{{url('')}}"><i class="ti-youtube"></i></a></li>
        </ul>
    </div>
</aside>