@extends ('layouts.master')

@section('title')
All Post By Categories
@endsection

@section('content')

<section class="section-sm">
    <div class="container">
        <div class="row justify-content-center">

            <!-- Recent Post -->
            <div class="col-lg-9 mt-5 mb-5 mb-lg-0">
                <h2 class="h5 section-title">Recent Post</h2>

                @if ($recentPost == [])

                    <article class="card mb-4">
                        <div class="card-body">
                            <h4>There are nothing here😢😢</h4>
                            <a href="{{url('')}}">Head back to the menu👍</a>
                        </div>
                    </article>

                @else
                    @foreach ($recentPost as $rcPost)
                        @if ($rcPost['status'] == 0)
                            <!-- Have IMG -->
                            <article class="card mb-4">
                                @if (isset($rcPost['image']))
                                    <div class="post-slider">
                                        <img src="{{asset($rcPost['image'])}}" class="card-img-top" alt="post-thumb">
                                    </div>
                                @else

                                @endif

                                <div class="card-body">
                                    <h3 class="mb-3"><a class="post-title" href="{{url('post/' . $rcPost['id'] . '')}}">
                                            {{$rcPost['tittle']}}
                                        </a></h3>
                                    <ul class="card-meta list-inline">
                                        <li class="list-inline-item">
                                            @if ($rcPost['user_id'] == 0)
                                                <a href="#" class="card-meta-author">
                                                    <span>{{$rcPost['name']}}</span>
                                                </a>
                                            @else
                                                <a href="{{url('')}}" class="card-meta-author">
                                                    @if ($rcPost['avatar'] != "")
                                                        <img src="{{asset($rcPost['avatar'])}}">
                                                    @endif

                                                    <span>{{$rcPost['name']}}</span>
                                                </a>
                                            @endif
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="ti-calendar"></i>{{$rcPost['created_at']}}
                                        </li>
                                        <li class="list-inline-item">
                                            <ul class="card-meta-tag list-inline">
                                                @foreach ($post_categories as $postCates)
                                                    @if ($postCates['post_id'] == $rcPost['id'])
                                                        <li class="list-inline-item">
                                                            <a href="{{url("post-by-category/{$postCates['id']}")}}">
                                                                {{$postCates['name']}}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="block-ellipsis">
                                        <p>
                                            <?= $rcPost['content'] ?>
                                        </p>
                                    </div>
                                    <a href="{{url('post/' . $rcPost['id'] . '')}}" class="btn btn-outline-primary mt-2">
                                        ReadMore
                                    </a>
                                </div>
                            </article>
                        @endif
                        

                    @endforeach
                @endif

                

                <ul class="pagination justify-content-center">

                    @for ($i = 1; $i <= $totalPage; $i++)

                        @if (isset($_GET['page']) && $_GET['page'] == $i)
                            <li class="page-item active">
                                <a href="{{url('post-by-category/?page=' . $i . '')}}" class="page-link">{{$i}}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a href="{{url('post-by-category/?page=' . $i . '')}}" class="page-link">{{$i}}</a>
                            </li>
                        @endif

                    @endfor

                    <li class="page-item">
                        <a href="{{url('?page=' . $totalPage . '')}}" class="page-link">&raquo;</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>

@endsection