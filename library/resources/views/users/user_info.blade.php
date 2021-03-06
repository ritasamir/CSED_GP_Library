<br>
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
        width: 70px;
        height: 35px;
        font-size: x-small;
        padding: 10px;

    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        cursor: inherit;
        display: block;
    }
</style>
<div class="container" style="padding-left: 50px">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 img-wrapper">

                            <img src="/uploads/avatars/{{   $user->profile_img}}" style="border-radius: 50%"
                                 class="thumbnail center-block img-responsive" height="150" width="150"
                                 alt="profile_img">
                            @if(Auth::user())
                                @if($user->id == \Illuminate\Support\Facades\Auth::user()->id)
                                    <form enctype="multipart/form-data"
                                        action="/profile/{{\Illuminate\Support\Facades\Auth::user()->id}}" method="POST">
                                        @csrf
                                        <span class="center-block btn btn-dark-gray btn-file">Browse <input type="file"
                                                                                                            name="profile_img"></span>
                                        {{--                                    <input type="file"  name="profile_img">--}}
                                        <input type="submit" style="margin-top: 5px; height: 30px;font-size: x-small"
                                            class="center-block btn btn-sm btn-secondary">
                                    </form>
                                @endif
                            @endif

                        </div>
                        <div class="col-sm-9">
                            <h1 style="padding-bottom: 10px">{{$user->name}}</h1>
                            <div class="row" style="padding-left: 25px;padding-bottom: 10px"><strong
                                    style="padding-right: 10px">Email
                                    :</strong> {{$user->email}}</div>
                            <div class="row" style="padding-left: 25px;padding-bottom: 10px"><strong
                                    style="padding-right: 10px">Phone
                                    number :</strong> {{$user->phone_number}}</div>
                            <div class="row" style="padding-left: 25px;padding-bottom: 10px"><strong
                                    style="padding-right: 10px">Department
                                    :</strong> {{$user->department}}</div>
                            <div class="row" style="padding-left: 25px;padding-bottom: 10px"><strong
                                    style="padding-right: 10px">Graduation
                                    Year :</strong> {{$user->graduation_year}}</div>
                            <div class="row" style="padding-left: 25px;padding-bottom: 10px"><strong
                                    style="padding-right: 10px">Role
                                    :</strong> {{($user->isTS) ? "Teaching Staff" : "Student"}}</div>
                            @if(Auth::user())

                                @if(\Illuminate\Support\Facades\Auth::user()->id == $user->id)
                                    <div class="row" style="padding-left: 25px;padding-bottom: 10px"><a
                                            href="{{ route('userInfo.edit') }}"
                                            style="background-color: #ff7236;text-overflow: ellipsis;float: right;margin-left: 10px"
                                            class="button">edit profile</a></div>

                                @endif
                            @endif
                        </div>
                        @if(Auth::user())
                            @if(\Illuminate\Support\Facades\Auth::user()->id == $user->id)
                                @if(!$user->isTS)

                                    <a href="{{ route('posts.disapproved') }}"
                                    style="background-color: #ff7236;text-overflow: ellipsis;float: right;margin-left: 10px"
                                    class="button">Posts
                                        Disapproved</a>

                                @endif
                                <a href="{{ url('/pendingPosts') }}"
                                style="background-color: #ff7236;text-overflow: ellipsis;float: right" class="button">Pending
                                    Posts</a>
                            @endif
                        @endif
                    </div>

                </div>
                <hr>
            </div>

        </div>

    </div>

</div>
