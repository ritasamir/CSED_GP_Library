@extends('layouts.app')

@section('content')
    @include('/users/user_info')

    <div class="container">
        <div class="col-md-10" style="padding-left: 50px">

            @foreach($posts as $post)
                <div class="row " style="padding-top: 20px">

                    <div class="col-sm-3">
                        <img src="images/blog/blog-06.jpg" style="border-radius: 50%" alt="project">
                    </div>

                    <div class="col-sm-9">
                        <a href="posts/{{$post->id}}"><h3>{{$post->slug}}</h3></a>
                        <div style="padding-top: 5px;padding-bottom: 5px">created at :</div>
                        <div class="container " style="
                        padding: 10px; max-width: 700px;  border: 1px solid #ff7236 ;border-radius: 10px;">

                            <div
                                style="height:35px;overflow: hidden;text-overflow: ellipsis;word-wrap: break-word;">{{$post->body}}</div>

                            <a href="posts/{{$post->id}}" style="color: #ff7236"> see more..</a>
                        </div>

                        <div style="padding-top: 10px">
                            {{--                            @foreach($post->contributers()->get() as $contributer)--}}
                            {{--                                <div>--}}
                            {{--                                    {{$contributer->name}}--}}
                            {{--                                </div>--}}
                            {{--                                @endforeach--}}
                            HERE , here

                        </div>

                    </div>


                </div>
            @endforeach

        </div>
    </div>


@endsection
