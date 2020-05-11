@extends('layouts.post')
@section('postcontent')
    <div class="post">
        <p>
            <h1 style="color:saddlebrown;">{{$post->title}}</h1>
        </p>

       <div class="entry" style="display: inline-block;">
            <h2 style="color:#ff7236;padding-bottom:15px;">Abstract</h2>
            <p style="width:auto;color:dimgray;">{{$post->abstract}}</p>
            <h2 style="color:#ff7236;padding-bottom:15px;">Fields</h2>
            <ul>
                @foreach($post->fields as $field)
                    <li><a href="#" style="color:dimgray;">{{$field-> fname}}</a></li>
                @endforeach
            </ul>
            <p class="links">
                <a href="{{$post->doc_url}}" target="_blank" rel="noopener noreferrer" style="background-color:#ff7236;border-color:dimgray;" class="button">
                Read Full Document
                </a>
                @if($post->approved)
                &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/comments/{{$post->id}}" style="background-color:#ff7236;border-color:dimgray;" class="button">Comments</a>
                @endif
                @if(Auth::user())
                    <?php $user = \Illuminate\Support\Facades\Auth::user()?>
                    @if(($user->isTS and in_array($user->id, $users_id)) or ($user->id == $post->user_id and !($post->approved)))
                            &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="/posts/{{$post->id}}/edit" style="background-color:#ff7236;" class="button">edit post</a>
                    @endif
                @endif
            </p>
        </div>

    </div>

@endsection
