@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">User Profile</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="user.png" class="thumbnail center-block" height="150" width="150"
                                     alt="Avatar">
                            </div>
                            <div class="col-sm-9">
                                <h1>{{$user->name}}</h1>
                                <div class="row" style="padding-left: 25px"><strong style="padding-right: 10px">Email
                                        :</strong> {{$user->email}}</div>
                                <div class="row" style="padding-left: 25px"><strong style="padding-right: 10px">Phone
                                        number :</strong> {{$user->phone_number}}</div>
                                <div class="row" style="padding-left: 25px"><strong style="padding-right: 10px">Department
                                        :</strong> {{$user->department}}</div>
                                <div class="row" style="padding-left: 25px"><strong style="padding-right: 10px">Graduation
                                        Year :</strong> {{$user->graduation_year}}</div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="card-body">
                        here
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
