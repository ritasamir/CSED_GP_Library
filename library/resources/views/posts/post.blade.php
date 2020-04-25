@extends('layouts.post')
@section('postcontent')
<div class="post">
    <p>
    <h1 style="color:saddlebrown;">{{$post->title}}</h1>
    </p>

    <div class="entry" style="display: inline-block;">
        <h2 style="color:chocolate;padding-bottom:15px;">Abstract</h2>
        <p style="width:auto;color:dimgray;">{{$post->abstract}}</p>
        <h2 style="color:chocolate;padding-bottom:15px;">Fields</h2>
        <ul>
            @foreach($post->fields as $field)
                <li><a href="#" style="color:dimgray;">{{$field-> fname}}</a></li>
            @endforeach
        </ul>
        <p class="links">
            <a href="https://{{$post->doc_url}}" target="_blank" rel="noopener noreferrer" style="background-color:chocolate;border-color:dimgray;" class="button">
            Read Full Document
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/comments/{{$post->id}}" style="background-color:chocolate;border-color:dimgray;" class="button">Comments</a>
        </p>
    </div>
    <p>
        <small style="float:right;">{{$post->created_at}}</small>
    </p>

</div>

@endsection
