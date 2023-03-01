@extends('layouts.app')

@section('content')
<div>
    <nav>
        <a href="{{route('posts-new')}}">new post</a>
    </nav>

    <div>
        <form action="{{route('posts-search')}}" method="get">
            
            <label for="query">Search Posts</label>
            <input id="query" name="query" placeholder="search posts"/>
            <button type="submit">Search</button>
        </form>
    </div>
    <nav>
        @if(!isset($page))
            $page = 1
        @endif
        @if($page > 1)
            <a href="{{route('posts', ['page'=>$page - 1])}}">Prev</a>
        @endif
        <a href="{{route('posts', ['page'=>$page + 1])}}">Next</a>
    </nav>
    @foreach($posts as $post)
        <div>
            <a href="{{route('post', $post->id)}}">{{$post->title}}</a>
        </div>
    @endforeach
</div>
@endsection
