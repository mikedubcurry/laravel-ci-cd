@extends('layouts.app')

@section('content')
<div>
<h1>{{$post->title}}</h1>
<p>{{$post->author->name}}</p>
<p>{{$post->body}}</p>
</div>
@endsection
