@extends('layouts.app')
@section('content')

    <div id="wrapper">
        <div id="page">
            <div id="page-bgtop">
                <div id="page-bgbtm">
                    <div class='col-md-16'>
                        <div id="content" style="float:right;">
                            @yield('postcontent')
                            <div style="clear: both;">&nbsp;</div>
                        </div>
                        <!-- end #content -->

                        <div id="sidebar" style="float:left;">
                            <ul>
                                <li>
                                    <img src="/uploads/images/{{$post->avatar}}"
                                         style="width:260px; height:200px;padding-left:9px;">
                                    <div style="clear: both;">&nbsp;</div>
                                </li>
                                <li>
                                    <h2 style="padding:5px;color:chocolate;">Supervisors</h2>
                                    <ul>
                                        @foreach($post->citations as $citation)
                                            @if($citation->user->isTS == 1)
                                                <li>
                                                    <img src="/uploads/avatars/{{$citation->user->profile_img}}"
                                                         style="width:30px; height:30px; float:left; border-radius:50%;align:middle;  ">
                                                    <a href="/profile/{{$citation->user_id}}"
                                                       style="font-size: 15px;padding-left:5px;"><strong> {{$citation->user->name}} </strong>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <h2 style="padding:5px;color:chocolate;">Collabrators</h2>
                                    <ul>
                                        @foreach($post->citations as $citation)
                                            @if($citation->user->isTS == 0)
                                                <li>
                                                    <img src="/uploads/avatars/{{$citation->user->profile_img}}"
                                                         style="width:30px; height:30px; float:left; border-radius:50%;align:middle;">
                                                    <a href="/profile/{{$citation->user_id}}"
                                                       style="font-size: 15px;padding-left:5px;"><strong> {{$citation->user->name}} </strong>
                                                    </a>
                                                </li>

                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- end #sidebar -->
                        <div style="clear: both;">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end #page -->
    </div>

@endsection
