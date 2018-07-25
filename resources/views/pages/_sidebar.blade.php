<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">

        @include('admin.errors')

        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>

            @foreach($popularPosts as $post)
                <div class="popular-post">


                    <a href="{{route('post.show', $post->slug)}}" class="popular-img">
                        <img src="{{$post->getImage()}}" alt="">

                        <div class="p-overlay"></div>
                    </a>

                    <div class="p-content">
                        <a href="{{route('post.show', $post->slug)}}" class="text-uppercase">
                            {{ $post->id }} - {{$post->title}}
                        </a>
                        <span class="p-date">{{$post->getDate()}}</span>

                    </div>
                </div>

            @endforeach

        </aside>





        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Featured Posts</h3>

            <div id="widget-feature" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer">


                    <div class="owl-wrapper" style="width: 1386px; left: 0px; display: block; transition: all 800ms ease; transform: translate3d(-231px, 0px, 0px);">

                        @foreach($featuredPosts as $post)
                        <div class="owl-item" style="width: 231px;">

                            <div class="item">
                                <div class="feature-content">
                                    <img src="{{$post->getImage()}}" alt="">

                                    <a href="{{route('post.show', $post->slug)}}" class="overlay-text text-center">
                                        <h5 class="text-uppercase">
                                            {{$post->title}}
                                        </h5>

                                        <p>{!!$post->description!!}</p>
                                    </a>
                                </div>
                            </div>

                        </div>
                        @endforeach


                    </div>

                </div>

            </div>

        </aside>







        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>

            @foreach($recentPosts as $post)
            <div class="thumb-latest-posts">


                <div class="media">
                    <div class="media-left">
                        <a href="{{route('post.show', $post->slug)}}" class="popular-img">
                            <img src="{{$post->getImage()}}" alt="">
                            <div class="p-overlay"></div>
                        </a>
                    </div>
                    <div class="p-content">
                        <a href="{{route('post.show', $post->slug)}}" class="text-uppercase">
                            {{$post->title}}
                        </a>
                        <span class="p-date">{{$post->getDate()}}</span>
                    </div>
                </div>
            </div>
            @endforeach

        </aside>



        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Categories</h3>
            <ul>
                @foreach($categories as $category)
                    <li>
                        <a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                        <span class="post-count pull-right"> ({{$category->posts()->count()}})</span>
                    </li>
                @endforeach
            </ul>
        </aside>



    </div>
</div>