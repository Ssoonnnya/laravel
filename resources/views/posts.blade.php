@extends('layout')

@section('content')


    @foreach($posts as $post) 
        <article>

            <h1>
                <a href="/posts/ {{$posts->slug }}">

                    {{ $post->title }}

                </a>
            
            </h1> 

            <div>
                <a href="/posts/{{ $post->body }}> ">

                    {{ $post->body }}
                
                </a>
            </div>

        </article>
    @endforeach

@endsection