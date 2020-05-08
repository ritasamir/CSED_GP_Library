@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-10" style="padding-left: 50px">
        <div class="row " style="padding-top: 20px">

            @foreach($users as $user)

                    <div class="col-sm-3">
                        <img src="images/posts/{{$user->profile_img}}" style="border-radius: 50%" alt="image">
                    </div>

                    <div class="col-sm-9">
                        <a href="#"><h3>{{$user->name}}</h3></a>
                        <div class="container " style="padding: 10px; max-width: 700px;  border: 1px solid #ff7236 ;border-radius: 10px;">

                            <div
                                style="overflow: hidden;text-overflow: ellipsis;word-wrap: break-word;">
                                <ul>
                                    <li>
                                        <label>Email</label> 
                                        <span>{{$user->email}}</span>
                                    </li>
                                    <li>
                                        <label>Department</label> 
                                        <span>{{$user->department}}</span>
                                    </li>
                                    <li>
                                        <label>Graduation Year</label> 
                                        <span>{{$user->graduation_year}}</span>
                                    </li>
                                    <li>
                                        @if($user->isTS=='1')
                                            <label>Position</label> 
                                            <span>Teaching Staff</span>
                                        @else
                                            <label>Position</label> 
                                            <span>Student</span>
                                        @endif
                                    </li>
                                    <li>
                                        <label>Nationa ID</label> 
                                        <span>{{$user->national_id}}</span>
                                    </li>
                                    <li>
                                        <label>Phone Number</label> 
                                        <span>{{$user->phone_number}}</span>
                                    </li>                                    
                                </ul>
                            </div>

                        </div>
                    </div>
                     <a href="{{action('AdminController@verify', $parameters = array('id' => $user->id))}}" style="background-color: #ff7236;text-overflow: ellipsis;float: right; margin:5px;" class="button"> Register </a>

                     <a href="{{action('AdminController@unverify', $parameters = array('id' => $user->id))}}" style="background-color: #ff7236;text-overflow: ellipsis;float: right; margin:5px;" class="button"> Remove </a>

                    </div>
            @endforeach
            </div>

        </div>
    </div>


@endsection
