@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <h1 class="center-content" style="margin-top: 50px">Edit Post</h1>

            <div class="card-body">
                <form method="POST" action="/posts/{{$post->id}}/update" enctype="multipart/form-data">
                    {{--                {!! Form::open($post,['route'=>['posts.update',$post->id],'method'=>'PUT'])!!}--}}
                    @csrf
                    {{Form::hidden('_method','PUT')}}

                    {{--post picture and title--}}
                    <div class="form-group row" style="margin-top: 150px;">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="/uploads/images/{{$post->avatar}}"
                                     style="width:260px; height:200px;padding-left:9px;">
                                <span class="center-block btn btn-dark-gray btn-file">Browse <input type="file"
                                                                                                    name="avatar"
                                                                                                    value="{{$post->avatar}}"></span>
                            </div>
                            <div class="col-md-6">

                                <label for="title"
                                       class="col-form-label text-md-right"
                                       style="font-size: large">{{ __('Title') }}</label>

                                <input id="title" type="text"
                                       class="form-control @error('title') is-invalid @enderror" name="title"
                                       value="{{$post->title}}" required autocomplete="title" autofocus/>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <br>
                    {{-- post abstract --}}
                    <div class="form-group row">
                        <label for="abstract"
                               class="col-md-4 col-form-label text-md-right">{{ __('Abstract') }}</label>

                        <textarea id="abstract" class="form-control @error('abstract') is-invalid @enderror"
                                  name="abstract" required
                                  style="height: 200px"
                                  autocomplete="abstract">{{$post->abstract}}
                                </textarea>
                        @error('abstract')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <br>
                    {{-- post document link --}}
                    <div class="form-group row">
                        <label for="link"
                               class="col-md-4 col-form-label text-md-right">{{ __('Link to Document') }}</label>
                        <div class="col-md-6">
                            <input type="url" id="link"
                                   pattern="https://.*" size="30"
                                   class="form-control @error('link') is-invalid @enderror" name="link"
                                   required autocomplete="off" value="{{$post->doc_url}}">
                            @error('link')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    {{--post collaborators--}}
                    <div class="form-group row selects-collaborators">
                        <label for="collaborators"
                               class="col-md-4 col-form-label text-md-right">{{ __('Collaborators') }}</label>

                        <div class="col-md-6 collaborators-select">
                            <div class="row ">
                                @foreach($collabs as $collab)
                                    <div style="margin-left: 10px" class="row collaborator-row">
                                        <div class="col-md-4">
                                            <input id="collaborators" type="text" class="form-control"
                                                   name="collaborators[]" value="{{$collab->name}}"
                                                   autocomplete="collaborators"></div>
                                        <div class="col-md-2">
                                            <a href="#" class="btn btn-xs btn-danger btn-remove-colab ">Remove</a>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                        @error('collaborators')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group row">

                        <label for="fields"
                               class="col-md-4 col-form-label text-md-right"
                               style="margin-top: 50px">{{ __('Fields') }}</label>
                        <div class="col-md-6">
                            <select class="form-control select2-multi"
                                    multiple="multiple" id="fields" name="fields[]">
                                <?php $terms = array();?>
                                @foreach($post->fields as $field)
                                    {!! array_push($terms, $field->id) !!}
                                @endforeach
                                @foreach($fields as $field)
                                    @if(in_array($field->id, $terms))
                                        <option selected value="{{ $field->id }}">{{ $field->fname }}</option>
                                    @else
                                        <option value="{{ $field->id }}">{{ $field->fname }}</option>
                                    @endif
                                @endforeach

                            </select>

                        </div>
                    </div>
                    <br>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Post') }}
                            </button>
                        </div>
                    </div>
                </form>
                {{--                {!! form::close() !!}--}}
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(".select2-multi").select2({
            placeholder: 'choose fields',
            allowClear: true,
        });
    </script>

    <script type="text/javascript">


        $(document).ready(function () {

            let countC = 1, html;

            dynamic_fieldC(countC);


            function dynamic_fieldC(numberC) {

                html = '<br>'
                html += '<div  class="row collaborator-row">\n' +
                    '                                <div class="col-md-4">\n' +
                    '                                    <input id="collaborators" type="text" class="form-control"\n' +
                    ' name="collaborators[]"  autocomplete="collaborators">' +
                    '                                </div>'
                if (numberC > 1) {
                    html += '<div class="col-md-2">\n' +
                        '                                    <a href="#" class="btn btn-xs btn-danger btn-remove-colab ">Remove</a>\n' +
                        '                                </div>\n' +
                        '                            </div>';
                    $('.collaborators-select').append(html);

                } else {
                    html += '                                <a href="#" class="btn btn-xs btn-info btn-add-more-colab">Add more Collaborators</a>\n' +
                        '\n' +
                        '                            </div>';
                    $('.collaborators-select').append(html);
                }

            }


            $(document).on('click', '.btn-add-more-colab', function () {
                countC++;
                dynamic_fieldC(countC);
            });


            $(document).on('click', '.btn-remove-colab', function () {
                countC--;
                $(this).closest(".collaborator-row").remove();
            });


        });
    </script>

@endsection
