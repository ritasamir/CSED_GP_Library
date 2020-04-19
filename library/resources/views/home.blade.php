@extends('layouts.app')

@section('content')
     <!-- Start: Products Section -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="main-news-list">
                        <div class="container">
                            <!-- Start: Search Section -->
                            <section class="search-filters">
                                <div class="filter-box">
                                    <h3>Search the CSED projects &amp; researches</h3>
                                    <form action="/search" method="POST" role="search">
                                        {{ csrf_field() }}
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="q"
                                                placeholder="Search posts"> <span class="input-group-btn">
                                                <button type="submit" class="btn btn-default">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <div class="clear"></div>
                            </section>
                            <!-- End: Search Section -->
   <!-- Start: Blog Section -->

            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="blog-main-list">
                        <div class="container">
                            <h4> {{$message ?? ''}} <b> {{ $query ?? '' }} </h4>
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
                                                    <a href="blog-detail.html"><img alt="blog" src="images/blog/blog-01.jpg" /></a>
                                                    <div class="post-share">
                                                        <a href="#."><i class="fa fa-comment"></i> 37</a>
                                                        <a href="#."><i class="fa fa-thumbs-o-up"></i> 110</a>
                                                        <a href="#."><i class="fa fa-eye"></i> 180</a>
                                                        <a href="#."><i class="fa fa-share-alt"></i> Share</a>
                                                    </div>
                                                </div>
                                                <div class="post-detail">
                                                    <header class="entry-header">
                                                        <div class="blog_meta_category">
                                                            <span class="arrow-right"></span>
                                                            @foreach($post->fields as $field)
                                                            <a href="#." rel="category tag">{{$field-> fname}}</a>,
                                                            @endforeach
                                                        </div>
                                                        <h3 class="entry-title"><a href="blog-detail.html">{{$post->title}}</a></h3>
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
                                <a href="#" id="loadmore">Load More Posts</a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        
        <!-- End: Blog Section -->
@endsection
