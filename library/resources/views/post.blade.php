@extends('layouts.post')
@section('content')
<div class="post">
    <p>
    <h1 class="title">{{$post->title}}</h1>
    </p>
    <div class="entry" style="display: inline-block;">
        <h1>Abstract</h1>
        <p style=" text-align:center; width:auto;">{{$post->abstract}}</p>
        <h1>Fields</h1>
        <ul>
            @foreach($post->fields as $field)
                <li><a href="#">{{$field-> fname}}</a></li>
            @endforeach
        </ul>
        <p class="links"><a href="../{{$post->doc_url}}" target="_blank" rel="noopener noreferrer" class="button">Read
                Full Document</a>
            &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="/comments/{{$post->id}}"
                                                                class="button">Comments</a></p>
    </div>
    <p>
        <small style="float:right;">{{$post->created_at}}</small>
    </p>

</div>

@endsection
