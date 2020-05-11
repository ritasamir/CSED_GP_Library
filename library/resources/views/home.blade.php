@extends('layouts.app')

@section('content')
<!-- Start: Products Section -->
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="main-news-list">
            <div class="container">
                <!-- Start: Search Section -->
                <section class="search-filters">
                    <div class="container">
                        <div class="filter-box ">
                            <h3>What are you looking for at the library?</h3>
                            <form action="/show_results" method="post">
                                {{ csrf_field() }}
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="sr-only" for="keywords">Search by Topic or Name</label>
                                        <input class="form-control" placeholder="Search by Keyword or Name" id="keyword" name="keywords" type="text">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <select class="option" id="year" name="year" >
                                            <option value="">Search by Year</option>
                                            <?php
                                            $years = array_combine(range(date("Y"), 1950), range(date("Y"), 1950));?>
                                            @foreach($years as $year)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" type="submit" value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="blog-main-list">
            <div class="container">
                <h4 style="font-family: FontAwesome; color:saddlebrown"> {{$message ?? ''}} <b></b> {{ $query ?? ''}} </h4>
                @include('layouts.errors')
                <div class="row">
                    <div class="blog-page grid">
                        @foreach($posts as $post)
                            <article>
                                <div class="grid-item blog-item">
                                    <div class="post-thumbnail">
                                        <div class="post-date-box">
                                            <div class="post-date">
                                                <a class="date" href="#.">{{$post->created_at->format('d')}}</a>
                                            </div>
                                            <div class="post-date-month">
                                                <a class="month" href="#.">{{$post->created_at->format('M')}}</a>
                                            </div>
                                        </div>
                                        <a href="/posts/{{$post->id}}"><img src="uploads/images/{{$post->avatar}}" onerror=this.src="/images/blog/cs.jpg" /></a>
                                    </div>
                                    <div class="post-detail">
                                        <header class="entry-header">
                                            <div class="blog_meta_category">
                                                <span class="arrow-right"></span>
                                                @foreach($post->fields as $field)
                                                <a href="#." rel="category tag">{{$field-> fname}}</a>,
                                                @endforeach
                                            </div>
                                            <h3 class="entry-header"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                                            <div class="entry-meta">
                                                <span>
                                                    @foreach($post->citations as $contributer)
                                                    <i class="fa fa-user"></i> <a href="#">{{explode(' ',trim($contributer->user->name))[0]}}</a>
                                                    @endforeach
                                                </span>
                                                <span><i class="fa fa-comment"></i> <a href="/comments/{{$post->id}}">{{$post->comments->count()}} Comments</a></span>
                                            </div>
                                        </header>
                                        <div class="entry-content" >
                                            <p>{{\Illuminate\Support\Str::limit($post->abstract,300)}}</p>
                                        </div>
                                        <footer class="entry-footer">
                                            <a class="btn btn-default" href="posts/{{$post->id}}">Read More</a>
                                        </footer>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <a style="background: rgba(255, 114, 54, 0.9)" href="/posts" id="loadmore">Load More Posts</a>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
