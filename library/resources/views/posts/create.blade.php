@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="center-content" style="margin-top: 50px">Add new Post</h1>
            <div class="card-body">
                <form method="POST" action="/posts" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row" style="margin-top: 150px;">
                        <div class="row">
                            <div class="col-md-3">
                                <span style="font-size: large; font-weight: bold">Upload Project Picture<input class="btn" type="file" name="avatar"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="title"
                                       class="col-form-label text-md-right"
                                       style="font-size: large">{{ __('Title') }}</label>

                                <input id="title" type="text"
                                       class="form-control @error('title') is-invalid @enderror" name="title"
                                       value="{{ old('title') }}" required autocomplete="title" autofocus/>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="abstract" style="font-size: large"
                               class="col-md-4 col-form-label text-md-right">{{ __('Abstract') }}</label>

                        <textarea id="abstract" class="form-control @error('abstract') is-invalid @enderror"
                                  name="abstract" required
                                  style="height: 200px"
                                  autocomplete="abstract">
                                </textarea>
                        @error('abstract')
                        <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="link" style="font-size: large;"
                               class="col-md-4 col-form-label text-md-right">{{ __('Link to Document') }}</label>
                        <div class="col-md-6">
                            <input type="url" id="link" placeholder="https://example.com"
                                   pattern="https://.*" size="30"
                                   class="form-control @error('link') is-invalid @enderror" name="link"
                                   required autocomplete="off">
                            @error('link')
                            <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-group row selects-collaborators" style="padding-bottom: 15px">
                        <label for="collaborators" style="font-size: large;"
                               class="col-md-4 col-form-label text-md-right">{{ __('Collaborators') }}</label>

                        <div class="col-md-6 collaborators-select">
                            <div class="row">
                            </div>
                        </div>
                        @error('collabrators')
                            <span class="invalid-feedback" role="alert">
                                        <strong style="color: red;">{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="fields" style="font-size: large"
                               class="col-md-4 col-form-label text-md-right">{{ __('Fields') }}</label>
                        <div class="col-md-6">
                            <select hidden class="js-example-basic-multiple" id="fields" name="fields[]" style="width: 100%" multiple="multiple">
                                @foreach($fields as $field)
                                    <option value="{{ $field->id }}">{{ $field->fname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
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
@endsection
@section('title')
    ADD NEW POST
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>

    <script type="text/javascript">
        $.fn.scrollPosReaload = function () {
            if (localStorage) {
                var posReader = localStorage["posStorage"];
                if (posReader) {
                    $(window).scrollTop(posReader);
                    localStorage.removeItem("posStorage");
                }
                $(this).click(function (e) {
                    localStorage["posStorage"] = $(window).scrollTop();
                });

                return true;
            }

            return false;
        }

        function insertAfter(referenceNode, newNode) {
            referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
        }

        $(document).ready(function () {

            var countC = 1;

            dynamic_fieldC(countC);


            function dynamic_fieldC(numberC) {

                html = '<br>'
                html = '<div class="row collaborator-row">\n' +
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
                    html += '<a href="#" class="btn" style="color: #fff; background-color: #ff7236; border-color: #ff601c;">Add more Collaborators</a>\n' +'\n' +
                        '                            </div>';
                    $('.collaborators-select').html(html);
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
