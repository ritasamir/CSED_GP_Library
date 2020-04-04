@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            

                <div class="card-body">
                    <form  method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label style="margin-top: 100px;" for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input style="margin-top: 100px; id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                            <label for="gradution_year"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Graduation Year') }}</label>

                            <div class="col-md-6">
                                <input id="gradution_year" type="text"
                                       class="form-control @error('graduation_year') is-invalid @enderror"
                                       name="graduation year"
                                       value="{{ old('graduation_year') }}" required autocomplete="graduation_year"
                                       autofocus>


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="department"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                            <div class="col-md-6">
                                <input id="department" type="text"
                                       class="form-control @error('department') is-invalid @enderror" name="department"
                                       value="{{ old('department') }}" required autocomplete="department" autofocus>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_number"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text"
                                       class="form-control @error('phone_number') is-invalid @enderror"
                                       name="phone_number"
                                       value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('title')
Signup
@endsection