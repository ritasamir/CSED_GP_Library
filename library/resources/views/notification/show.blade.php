@extends('layouts.app')

@section('content')

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="cart-main">
                <div class="container">
                    <div class="row">
                        <div class="cart-head">
                            <div class="col-xs-1 col-sm-8 account-option">
                                <strong>Your Notifications :</strong>

                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="page type-page status-publish hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce table-tabs" id="responsiveTabs">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><b class="arrow-up"></b><a data-toggle="tab"
                                                                                              href="#sectionA">Not
                                                        Read</a></li>
                                                <li><b class="arrow-up"></b><a data-toggle="tab"
                                                                               href="#sectionB">Read</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="sectionA" class="tab-pane fade in">
                                                    <a href="/notification"
                                                       action="{{$notificationsNotRead->markAsRead()}}"
                                                       style="background-color: #ff7236;text-overflow: ellipsis;"
                                                       class="button"> markAsRead </a>
                                                    @forelse($notificationsNotRead as $notification)
                                                        @if($notification->data['status']=='approved')
                                                            <div class="row"
                                                                 style="padding-top: 25px;padding-bottom: 10px">
                                                                <li>
                                                                    <a href="/posts/{{$notification->data['post']['id']}}"
                                                                       style="color:dimgray;">Congratulation ! your
                                                                        post {{$notification->data['post']['title']}}
                                                                        has been approved</a>
                                                                </li>
                                                            </div>

                                                        @endif
                                                        @if($notification->data['status']=='disapproved')
                                                            <div class="row"
                                                                 style="padding-top: 25px;padding-bottom: 10px">
                                                                <li>
                                                                    <a href="/posts/{{$notification->data['post']['id']}}"
                                                                       style="color:dimgray;">Sorry ! your
                                                                        post {{$notification->data['post']['title']}}
                                                                        has been disapproved</a>
                                                                </li>
                                                            </div>
                                                        @endif
                                                        @if($notification->data['status']=='addComment')
                                                            <div class="row"
                                                                 style="padding-top: 25px;padding-bottom: 10px">
                                                                <li>
                                                                    <a href="{{ url('/posts',$notification->data['postId']) }}"
                                                                       style="color:dimgray;">{{$notification->data['userName']}}
                                                                        commented
                                                                        on {{$notification->data['postTitle']}}
                                                                        post.</a>
                                                                </li>
                                                            </div>
                                                        @endif
                                                    @empty
                                                        <p style="padding-top:10px;">There are no notifications
                                                        yet </p>
                                                    @endforelse
                                                </div>
                                                <div id="sectionB" class="tab-pane fade in">
                                                    @forelse($notificationsRead as $notification)
                                                        @if($notification->data['status']=='approved')
                                                            <div class="row"
                                                                 style="padding-top: 25px;padding-bottom: 10px">
                                                                <li><a href="/posts/{{$notification->data['post']['id']}}" style="color:dimgray;">Congratulation !
                                                                        your
                                                                        post {{$notification->data['post']['title']}}
                                                                        has been approved</a>
                                                                </li>
                                                            </div>

                                                        @endif
                                                        @if($notification->data['status']=='disapproved')
                                                            <div class="row"
                                                                 style="padding-top: 25px;padding-bottom: 10px">
                                                                <li><a href="/posts/{{$notification->data['post']['id']}} " style="color:dimgray;">Sorry ! your
                                                                        post {{$notification->data['post']['title']}}
                                                                        has been disapproved</a>
                                                                </li>
                                                            </div>
                                                        @endif
                                                        @if($notification->data['status']=='addComment')
                                                            <div class="row"
                                                                 style="padding-top: 25px;padding-bottom: 10px">
                                                                <li>
                                                                    <a href="{{ url('/posts',$notification->data['postId']) }}"
                                                                       style="color:dimgray;">{{$notification->data['userName']}}
                                                                        commented
                                                                        on {{$notification->data['postTitle']}}
                                                                        post.</a>
                                                                </li>
                                                            </div>
                                                        @endif
                                                    @empty
                                                        <p style="padding-top:10px;"">There are no notifications
                                                        yet </p>
                                                    @endforelse
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>




@endsection
