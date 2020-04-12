@extends('layouts.post')
@section('postcontent')
    <div>
        <a href="/posts/{{$post->id}}"  style="float:left;color:chocolate;"><i class="fa fa-arrow-left"
                                                              style="font-size:30px;padding-right:8px;"></i></a>
        <p>
          <h1 style="color:saddlebrown;">{{$post->title}}</h1>
        </p>
    </div>

    <div style="clear: both;">&nbsp;</div>
    <div class="container" style="padding:10px;">
    @foreach($comments as $comment)
            <div class="post">
                <div class="card-body">
                    <div class="row">
                        <div>
                            <img src="/uploads/avatars/{{$comment->user->profile_img}}"
                                 class="img img-rounded img-fluid"
                                 style="width:30px; height:30px; float:left; border-radius:50%;align:middle;  "/>
                        </div>
                        <div class="col-md-3">
                            <p>
                                <a class="float-left" href="#" style="padding-left:8px;">
                                    <strong> {{$comment->user->name}}</strong>
                                </a>
                            </p>
                            <p style="padding-left:15px;font-size:15px;">{{$comment->body}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                                <p><a style="float:right;font-size:10px;">{{$post->created_at}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
    <p class="links">
      <a href="/comments/{{$post->id}}/create"class="button" style="background-color:chocolate;color:black;">Add new Comment</a>
    </p>
    </div>
@endsection
