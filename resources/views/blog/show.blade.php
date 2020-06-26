@extends('blog.layout')

@section('content')

    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @include('admin.errors')
                    <article class="post">
                        <div class="post-thumb">
                            <img src="{{ asset($post->getImage()) }}" alt="">
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                @if($post->hasCategory())
                                    <h6><a href="{{ route('category.show', $post->category->slug) }}">{{ $post->getCategory() }}</a></h6>
                                @else
                                    <h6>Без категории</h6>
                                @endif
                                <h1 class="entry-title">{{ $post->title }}</h1>
                            </header>
                            <div class="entry-content">
                                {!! $post->content !!}
                            </div>
                            <div class="decoration">
                                @foreach($post->tags as $tag)
                                    <a href="{{ route('tag.show', $tag->slug) }}" class="btn btn-default">{{ $tag->title }}</a>
                                @endforeach
                            </div>

                            <div class="social-share">
							<span
                                class="social-share-title pull-left text-capitalize">
                                @if($post->hasAuthor())
                                    By {{ $post->author->name }}
                                @endif
                                On {{ $post->getDate() }}</span>
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
{{--                    @if($post->hasAuthor())--}}
{{--                        <div class="top-comment"><!--top comment-->--}}
{{--                        <img src="{{ asset($post->author->getAvatar()) }}" class="pull-left img-circle" alt="">--}}
{{--                        <h4>{{ $post->author->name }}</h4>--}}
{{--                        <p>{{ $post->author->profileStatus }}</p>--}}
{{--                    </div><!--top comment end-->--}}
{{--                    @endif--}}
                    <div class="row"><!--blog next previous-->
                        @if($post->hasPrevious())
                            <div class="col-md-6">
                                <div class="single-blog-box">
                                    <a href="{{ $post->getPrevious()->slug }}">
                                        <img src="{{ asset($post->getPrevious()->getImage()) }}" alt="">
                                        <div class="overlay">
                                            <div class="promo-text">
                                                <p><i class=" pull-left fa fa-angle-left"></i></p>
                                                <h5>{{ $post->getPrevious()->title }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                        @if($post->hasNext())
                            <div class="col-md-6">
                                <div class="single-blog-box">
                                    <a href="{{ $post->getNext()->slug }}">
                                        <img src="{{ asset($post->getNext()->getImage()) }}" alt="">
                                        <div class="overlay">
                                            <div class="promo-text">
                                                <p><i class=" pull-right fa fa-angle-right"></i></p>
                                                <h5>{{ $post->getNext()->title }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif

                    </div><!--blog next previous end-->
                    <div class="related-post-carousel"><!--related post carousel-->
                        <div class="related-heading">
                            <h4>You might also like</h4>
                        </div>
                        <div class="items">
                            @foreach($post->related() as $item)
                                <div class="single-item">
                                    <a href="{{ route('post.show', $item->slug) }}">
                                        <img src="{{ asset($item->getImage()) }}" alt="">
                                        <p>{{ $item->title }}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div><!--related post carousel-->
                    @if(!$post->comments->isEmpty())
                        @foreach($post->getComments() as $comment)
                            <div class="bottom-comment"><!--bottom comment-->
                        <div class="comment-img" style="height: 60px">
                            <img class="img-circle" src="{{ asset($comment->author->getAvatar()) }}" alt=""
                            width="75" height="75">
                        </div>
                        <div class="comment-text">
                            <h5>{{$comment->author->name}}</h5>
                            <p class="comment-date">
                                {{$comment->created_at->diffForHumans()}}
                            </p>
                            <p class="para">{{$comment->text}}</p>
                        </div>
                    </div>
                        @endforeach
                    @endif



                    @if(Illuminate\Support\Facades\Auth::check())
                        <div class="leave-comment"><!--leave comment-->
                            <h4>Leave a reply</h4>
                            {!! Form::open(['route' => 'comment', 'method' => 'post',
                            'class' => "form-horizontal contact-form", 'role' => "form"]) !!}
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="form-group">
                                    <div class="col-md-12">
										<textarea class="form-control" style="resize: none" rows="3" name="comment"
                                                  placeholder="Write Massage"></textarea>
                                    </div>
                                </div>
                            <button type="submit" class="btn send-btn">Comment</button>
                            {!! Form::close() !!}
                        </div><!--end leave comment-->
                    @endif

                </div>
                @include('blog.sidebar')
            </div>
        </div>
    </div>

@endsection