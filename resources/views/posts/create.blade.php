@extends('layouts.app')

@section('content')
<div>
    <form action="{{route('posts-save')}}" method="post">
        @csrf
        <label  for="title">Title</label>
        <input name="title" id="title" placeholder="Post Title" />
        <label name="body" for="body">Post Body</label>
        <textarea id="body" name="body" placeholder="Post Body"></textarea>
        <button type="submit">Create Post</button>
    </form>
</div>
@endsection
