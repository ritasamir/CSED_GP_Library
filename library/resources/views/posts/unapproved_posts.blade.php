@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class=" error-info center-content" style="margin: 20px"> Posts Waiting to be approved</h1>
        <div class="col-md-10" style="padding-left: 50px">

            @foreach($posts as $post)
                <div class="row " style="padding-top: 20px">

                    <div class="col-sm-3">
                        <img src="uploads/images/{{$post->avatar}}" style="border-radius: 50%" onerror=this.src="images/blog/cs.jpg">
                    </div>

                    <div class="col-sm-9">
                        <a href="posts/{{$post->id}}"><h3>{{$post->title}}</h3></a>
                        <div style="padding-top: 5px;padding-bottom: 5px">created at : {{$post->created_at}}</div>
                        <div class="container " style="
                        padding: 10px; max-width: 700px;  border: 1px solid #ff7236 ;border-radius: 10px;">

                            <div
                                style="height:35px;overflow: hidden;text-overflow: ellipsis;word-wrap: break-word;">{{$post->abstract}}</div>

                            <a href="/posts/{{$post->id}}" style="color: #ff7236"> see more..</a>
                        </div>

                        <div style="padding-top: 10px">
                            @foreach($post->citations as $contributer)
                                <div>
                                    {{$contributer->user->name}}
                                </div>
                            @endforeach


                        </div>

                    </div>

                </div>
            @endforeach

        </div>
    </div>


@endsection
