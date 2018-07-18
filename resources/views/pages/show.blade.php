@extends('layout')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">



                    <article class="post">
                        <div class="post-thumb">

                            <a href="#">
                                <img src="{{ $post->getImage() }}" alt="">
                            </a>

                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6>
                                    <a href="#">{{ $post->getCategoryTitle() }}</a>
                                </h6>

                                <h1 class="entry-title">
                                    <a href="#">{{ $post->title }}</a>
                                </h1>


                            </header>
                            <div class="entry-content">


                                {!! $post->contenido !!}


                            </div>
                            <div class="decoration">
                                @foreach($post->tags as $tag)
                                    <a href="{{route('tag.show', $tag->slug)}}" class="btn btn-default">
                                        {{$tag->title}}
                                    </a>
                                @endforeach
                            </div>

                            <div class="social-share">
							<span
                                    class="social-share-title pull-left text-capitalize">
                            {{ $post->getDate() }}
                            </span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </article>





                </div>



            </div>
        </div>
    </div>
    <!-- end main content-->
@endsection