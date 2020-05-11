@extends('layouts.app')

<script type="text/javascript">
    window.onload = function () {
        //Reference the DropDownList.
        var ddlYears = document.getElementById("ddlYears");

        //Determine the Current Year.
        var currentYear = (new Date()).getFullYear();

        //Loop and add the Year values to DropDownList.
        for (var i = 1950; i <= currentYear; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            ddlYears.appendChild(option);
        }
    };
</script>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">

                <div class="card-body">
                    <form method="POST" action="{{route('userInfo.update')}}">
                        @csrf
                        {{Form::hidden('_method','PUT')}}


                        <div class="col-md">
                            <div class="form-group row">
                                <label style="margin-top: 100px;" for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input style="margin-top: 100px;" id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{$user->name}}" required autocomplete="name" autofocus/>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{$user->email}}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 ">
                                    <label for="password"
                                           class="col-form-label text-md-right">{{ __('New Password') }}</label>
                                    <div class="small">enter your old or new</div>
                                </div>


                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="phone_number"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text"
                                           class="form-control @error('phone_number') is-invalid @enderror"
                                           name="phone_number"
                                           value="{{ $user->phone_number}}" required autocomplete="phone_number"
                                           autofocus>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                        {{ __('Update profile') }}
                            </button>
                        </div>
                  
                    </form>
                        
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        $('.select2-selection--single').select2();
        $('.select2-selection--single').val(graduation_year);


    </script>
@endsection
