@extends('layouts.post')
@section('content')

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <div>
        <a href="/posts/{{$post->id}}" style="float:left;"><i class="fa fa-arrow-left"
                                                              style="font-size:30px;padding-right:8px;"></i></a>
        <h2 class="title">{{$post->title}}</h2>
    </div>
    <p class="meta"><span class="date">{{$post->created_at}}</span></p>
    <div style="clear: both;">&nbsp;</div>
    @foreach($comments as $comment)
        <div class="container" style="padding:10px;">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="/uploads/avatars/{{$comment->user->profile_img}}"
                                 class="img img-rounded img-fluid"
                                 style="width:30px; height:30px; float:left; border-radius:50%;align:middle;  "/>
                        </div>
                        <div class="col-md-10">
                            <p>
                                <a class="float-left" href="#" style="padding-left:8px;">
                                    <strong> {{$comment->user->name}}</strong>
                                </a>
                            </p>
                            <p style="padding-left:15px;font-size:18px;">{{$comment->body}}</p>
                            <p><a style="float:right;font-size:10px;">{{$post->created_at}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endforeach

<p class="links"><a href="/comments/{{$post->id}}/addNew" class="button">Add new Comment</a></p>
@endsection
