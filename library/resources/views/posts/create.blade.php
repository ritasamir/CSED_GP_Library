@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <div class="card-body">
                    <form method="POST" action="/posts">
                        @csrf
                        <!-- <img src="uploads/avatars/{{$user->profile_img}}" style="border-radius: 50%"
                                 class="thumbnail center-block img-responsive" height="150" width="150"
                                 alt="profile_img"> -->
                        <div class="form-group row">
                            <span class="center-block btn btn-dark-gray btn-file">Browse <input type="file"
                                                                                                        name="avatar"></span>
                                    {{--                                    <input type="file"  name="avatar">--}}
                        </div>
                        <div class="form-group row">
                            <label style="margin-top: 100px;" for="title"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input style="margin-top: 100px;" id="title" type="text"
                                       class="form-control @error('title') is-invalid @enderror" name="title"
                                       value="{{ old('title') }}" required autocomplete="title" autofocus/>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="abstract"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Abstract') }}</label>

                            <div class="col-md-6">
                                <textarea id="abstract" class="form-control @error('abstract') is-invalid @enderror"
                                       name="abstract" value="{{ old('abstract') }}" required autocomplete="abstract">
                                </textarea>
                                @error('abstract')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="link"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Link to Document') }}</label>
                            <div class="col-md-6">
                                <input type="url" name="url" id="link"placeholder="https://example.com" pattern="https://.*" size="30"
                                       class="form-control @error('link') is-invalid @enderror" name="link"
                                       required autocomplete="off">
                                @error('link')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="collabrators"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Collabrators') }}</label>

                            <div class="col-md-6">
                                <input id="collabrators" type="text" class="form-control"
                                       name="collabrators[]" required autocomplete="collabrators">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="supervisors"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Supervisors') }}</label>

                            <div class="col-md-6">
                                <input id="supervisors" type="text" class="form-control"
                                       name="supervisors[]" required autocomplete="supervisors">
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="fields"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Fields') }}</label>

                            <div class="col-md-6">
                                <select class="form-control select2-multi" multiple="multiple" name="fields[]">
                        
                                    @foreach($fields as $field)
                                        <option value="{{ $field->fname }}">{{ $field->fname }}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="fields"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Fields') }}</label>

                            <div class="col-md-6">
                            <input type="text" name="fields" pattern="^[a-zA-Z\s,]+$" placeholder="e.g Computer Vision, NLP" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Post') }}
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
    ADD NEW POST
@endsection